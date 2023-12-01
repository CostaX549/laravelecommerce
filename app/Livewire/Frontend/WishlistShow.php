<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistShow extends Component
{
    
    public function removeWishlistItem(int $wishlistId) {

        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();

      
        $this->dispatch('post-created');
     
        $this->dispatch('message', title: 'Item da lista de desejos removido com sucesso.', type: 'success');
      
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',
    [
       'wishlist' => $wishlist
    ]);
    }
}
