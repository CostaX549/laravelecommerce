<?php

namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On; 


class CartCount extends Component
{
    public $cartCount;
    
    #[On('cart-created')] 
    public function checkCartCount() {
        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->cartCount = 0;
        }
    }
    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.frontend.cart.cart-count', [
          'cartCount' => $this->cartCount
        ]);
    }
}
