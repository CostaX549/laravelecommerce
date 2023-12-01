<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;
    public $isInWishlist = false;

  

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatch('message', title: 'Já foi adicionado a lista de desejo', type: 'warning');
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->isInWishlist = true; // Defina como true após adicionar com sucesso
                $this->dispatch('message', title: 'Adicionado à lista de desejos com sucesso.', type: 'success');
                $this->dispatch('post-created');    
            }
        } else {
            $this->dispatch('message', title:'Por favor faça login para continuar.', type:  'info');
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'ForaDeEstoque';
        }
    }

    public function incrementQuantity() {
        if($this->quantityCount < 10) {

        $this->quantityCount++;

       }
    }

    public function decrementQuantity() {

        if($this->quantityCount > 1) {

        $this->quantityCount--;
        }
    }

    public function addToCart(int $productId) {
        if(Auth::check()) {
           //dd($productId);

           if($this->product->where('id', $productId)->where('status', '0')->exists()) 
           {
            // Checar a quantidade de produtos com a cor e inserir ao carrinho
            if($this->product->productColors()->count() > 1) {

               if ($this->prodColorSelectedQuantity != NULL){
                if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->where('product_color_id', $this->productColorId)->exists())  {
                    $this->dispatch('message', title:'Este produto já foi adicionado ao carrinho.', type:  'warning');
                } else {
                    
                    
                    $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                    if($productColor->quantity > 0) {
                     if($productColor->quantity >= $this->quantityCount) {
                           
                         Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'product_color_id' => $this->productColorId,
                            'quantity' => $this->quantityCount
 
                         ]);
                         $isInCart = true;
                         $this->dispatch('cart-created');
                         $this->dispatch('message', title:'Produto adicionado ao carrinho.', type:  'success');
                        } else {
                            $this->dispatch('message', title:'Apenas ' .$productColor->quantity. ' Produtos disponíveis', type:  'warning');
                        }
 
                    } else {
                     $this->dispatch('message', title:'Fora de Estoque', type:  'warning');
                    }
                }
             
               
               } else {
                $this->dispatch('message', title:'Selecione uma cor', type:'info');
               }

            } else {
                if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    $this->dispatch('message', title:'Este produto já foi adicionado ao carrinho.', type:  'warning');
                } else {
                    if($this->product->quantity > 0) {
                        if($this->product->quantity >= $this->quantityCount) {
        
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                
                                'quantity' => $this->quantityCount
                                
     
                             ]);
                             $this->dispatch('cart-created');
                             $this->dispatch('message', title:'Produto adicionado ao carrinho.', type:  'success');
                     
                        } else {
                            $this->dispatch('message', title:'Apenas'.$this->product->quantity.'Produtos disponíveis', type:  'warning');
                        }
                    } else {
                        $this->dispatch('message', title:'Fora de Estoque', type:  'warning');
                    }
                }
               
            }
        
            
           } else {
            $this->dispatch('message', title:'Este produto não existe.', type:  'warning');
           }
        } else {
            $this->dispatch('message', title:'Por favor faça login para adicionar ao carrinho.', type:  'info');
            return false;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
        
        // Verifique se o produto já está na lista de desejos do usuário
        if (Auth::check()) {
            $userId = auth()->user()->id;
            $productId = $this->product->id;

            if (Wishlist::where('user_id', $userId)->where('product_id', $productId)->exists()) {
                $this->isInWishlist = true;
            }
        }
    }

    public function render()
    {

    
     
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        
            
        ]);
    }

    public function removeFromWishlist($productId)
    {
    
        if (auth()->check()) {
            $userId = auth()->user()->id;
    
            $wishlistItem = Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();
    
            if ($wishlistItem) {
               
                $wishlistItem->delete();
    
              
                $this->isInWishlist = false;
    
                $this->dispatch('post-created');        
                $this->dispatch('message', title: 'Item removido da lista de desejos.', type: 'success');
            } else {
               
                $this->dispatch('message', title: 'Item não encontrado na lista de desejos.', type:'warning');
            }
        } else {
            $this->dispatch('message', title: 'Por favor faça login para continuar.', type: 'info');
        }
    }
}
