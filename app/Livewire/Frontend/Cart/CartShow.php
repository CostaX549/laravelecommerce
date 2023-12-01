<?php

namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;
   public $isInCart = false;
   public $cartData;

    

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->quantity > 1){
    
                $cartData->decrement('quantity');
                $this->dispatch('message', title:'Quantidade editada.', type:  'success');
            }else{
                $this->dispatch('message', title:'A quantidade não pode ser menor que 1.', type:  'error'); 
            }
        }else{
    
            $this->dispatch('message', title:'Algo aconteceu de errado.', type:  'error'); 
        }
    }
    public function incrementQuantity(int $cartId) {

       
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData) {
            if($productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatch('message', title:'Quantidade editada.', type:  'success');
                } else {
                    $this->dispatch('message', title:'Apenas ' .$productColor->quantity. ' Produtos Disponíveis.', type:  'error');
                }
            } else {
                if($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatch('message', title:'Quantidade editada.', type:  'success');
                }
                else {
                    $this->dispatch('message', title:'Apenas ' .$cartData->product->quantity. ' Produtos Disponíveis.', type:  'error');
                }
            }
           
          
          
        } else {
            $this->dispatch('message', title:'Algo aconteceu de errado!', type:  'error');
        }
    }

    public function removeCartItem(int $cartId) {
       $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
       if($cartRemoveData) {
        $cartRemoveData->delete();
        $this->dispatch('cart-created');
        $this->dispatch('message', title:'Item do carrinho removido com sucesso.', type:  'success');
       } else {
        $this->dispatch('message', title:'Algo aconteceu de errado!', type:  'error');
       }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        $this->cartData = Cart::where('user_id', auth()->user()->id)->exists();
       
        return view('livewire.frontend.cart.cart-show', [
            'cart' =>  $this->cart,
            'cartData' => $this->cartData
           
        ]);
    }
}
