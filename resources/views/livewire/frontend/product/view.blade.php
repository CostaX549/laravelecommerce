







     
<!--  Seção de produtos em tendência -->
<div>
   
      
        <div class = "main-wrapper">
            <div class = "container">
                <div class = "product-div">
                    <div class = "product-div-left">
                        <div class = "img-container">
                            <img src="{{ asset($product->productImages[0]->image) }}" alt="">
                        </div>

                        <div class = "hover-container">
                              @foreach($product->productImages as $itemImage)
                            <div><img src="{{ asset($itemImage->image) }}"></div>   
                           
                            @endforeach
                        </div>
                        
                       
                    </div>
                    <div class = "product-div-right">
                        <span class = "product-name">{{ $product->name }}</span>
                   
                        <span class = "product-price">R$ {{ $product->selling_price }}</span>
                        @if($product->productColors->count() > 0)
                        @if($product->productColors)
                            @foreach($product->productColors as $colorItem)
                                <label class="color-label" style="background-color: {{ $colorItem->color->code }};" wire:click="colorSelected({{ $colorItem->id }})">
                                    {{$colorItem->color->name}}
                                </label>
                            @endforeach
                        @endif
                    
                        @if($this->prodColorSelectedQuantity == 'ForaDeEstoque')
                            <label class="availability-label out-of-stock" style="margin-top: 40px;">Fora de Estoque</label>
                        @elseif($this->prodColorSelectedQuantity > 0)
                            <label class="availability-label in-stock">Em estoque</label>
                        @endif
                    @else
                        @if($product->quantity)
                            <label class="availability-label in-stock">Em estoque</label>
                        @else
                            <label class="availability-label out-of-stock" >Fora de estoque</label>
                        @endif
                    @endif
                        <div class = "product-rating">
                            <div class="quantity-container">
                                <button class="quantity-button" id="decrement" wire:click="decrementQuantity">-</button>
                                <input class="quantity-input" wire:model="quantityCount" id="quantity" type="text" readonly value="{{ $this->quantityCount }}">
                                <button class="quantity-button" id="increment" wire:click="incrementQuantity">+</button>
                            </div>
                        
                        </div>
                        <p class = "product-description">{{ $product->small_description }}</p>
                        <div class = "btn-groups">
                            <button type = "button" wire:click="addToCart({{ $product->id }})" class = "add-cart-btn"><i class='bx bx-cart'></i> adicionar ao carrinho</button>
                            <button type = "button" class = "buy-now-btn"><i class = "fas fa-wallet"></i>compre agora</button>
                            <div class="heart-icons">
                                @if($isInWishlist)
                                    <i wire:click="removeFromWishlist({{ $product->id }})" id="heart-icon" class='bx bxs-heart'></i>
                                @else
                                    <i wire:click="addToWishList({{ $product->id }})" id="heart-icon" class='bx bx-heart'></i>
                                @endif
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
 
    
  
</div>
