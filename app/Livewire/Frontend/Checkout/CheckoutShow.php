<?php

namespace App\Livewire\Frontend\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use Livewire\Attributes\On; 

class CheckoutShow extends Component
{
    public $carts;
    public $orderPlaced = false;
    public $totalProductAmount = null; // Inicialize como null

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

 #[On('validationForAll')] 
public function validationForAll() {
    $this->validate();
}
    public function totalProductAmount()
    {
        if ($this->totalProductAmount === null) {
            $this->carts = Cart::where('user_id', auth()->user()->id)->get();
            $this->totalProductAmount = 0; // Inicialize com 0
            foreach ($this->carts as $cartItem) {
                $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
            }
        }
        return $this->totalProductAmount;
    }

        #[On('transactionEmit')]
        public function transactionEmit($transactionId) {
            $this->payment_id = $transactionId;
            $this->payment_mode = 'Pagamento pelo Paypal';
            $codOrder = $this->placeOrder();
            if($codOrder) {
                Cart::where('user_id', auth()->user()->id)->delete();
                return redirect('/thankyou');
                $this->orderPlaced = true; // Define a variável como verdadeira para indicar que a compra foi realizada com sucesso
             
                $this->dispatch('message', title:'Compra realizada com sucesso.', type:  'success');
             
            } else {
                $this->dispatch('message', title:'Algo aconteceu de errado!', type:  'error');
            }
        }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder() {
        $this->validate();
        $order = Order::create([
        'user_id' => auth()->user()->id,
        'tracking_no'=> 'spot-'.Str::random(10),
        'fullname' => $this->fullname,
        'email'=> $this->email,
        'phone'=> $this->phone,
        'pincode'=> $this->pincode,
        'address'=> $this->address,
        'status_message' => 'in progress',
        'payment_mode' => $this->payment_mode,
        'payment_id' => $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem) {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id'=> $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            if($cartItem->product_color_id != NULL) {
              $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
           
        }

        return $order;

      
    }

    public function codOrder()
    {
       $this->payment_mode = 'Pagamento na Entrega';
       $codOrder = $this->placeOrder();

       if($codOrder) {
     
        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect('/thankyou');
        $this->orderPlaced = true; 
        $this->dispatch('message', title:'Compra realizada com sucesso.', type:  'success');
      
    
       } else {
        $this->dispatch('message', title:'Algo aconteceu de errado!', type:  'error');
       }
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $totalProductAmount
        ]);
    }
}