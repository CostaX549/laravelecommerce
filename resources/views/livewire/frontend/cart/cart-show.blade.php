<div>
    

      
        <div class="container" id="trending"> <!-- Adicione o estilo inline para aplicar o padding -->
            <h2 style="padding-top: 75px; color: #fff; text-align: center;">Carrinho</h2>
            <hr style="margin-bottom: 15px;;">
   
                @forelse ($cart as $cartItem)
                @if($cartItem->product)
                <div class="cart-item">
                    @if($cartItem->product->productImages)
                    <img src="{{ asset($cartItem->product->productImages[0]->image)}}">
                    @else
                    <img src="" alt="">
                    @endif
                    <div class="product-info">
                        <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                            <div class="product-name">{{ $cartItem->product->name }}</div>
                          
                        </a>    
                        @if($cartItem->productColor)
                       
                        <label class="color-label" style="background-color: {{ $cartItem->productColor->color->code }};">
                            {{$cartItem->productColor->color->name}}
                        </label>
                        <br>
                       @endif
                        <div class="price">R${{ $cartItem->product->selling_price }}</div>
                        <br>
                <div class="price">Total: R${{ $cartItem->product->selling_price * $cartItem->quantity}}</div>
                @php $totalPrice +=  $cartItem->product->selling_price * $cartItem->quantity @endphp
               
            
                    </div>
                    <div class = "product-rating">
                        <div class="quantity-container">
                            <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})" class="quantity-button" id="decrement">-</button>
                            <input class="quantity-input" id="quantity" type="text" value="{{ $cartItem->quantity }}" readonly>
                            <button  type="button"  wire:loading.attr="disabled"  wire:click="incrementQuantity({{ $cartItem->id }})"  class="quantity-button" id="increment">+</button>
                        </div>
                    
                    </div>
                    <div class="remove">
                        <button type="button"  wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id }})" class="btn-remove">
                            
                            <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})" >
                                <i class="fa fa-trash"></i> Remover
                            </span>

                            <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})" >
                                <i class="fa fa-trash"></i> Removendo...
                            </span>
                          
                        </button>
                    </div>
                </div>
                
                @endif
                @empty
                <div class="no-products">Nenhum produto adicionado no carrinho.</div>
                @endforelse
               
             
        </div>
        @if ($cartData)
        <div class="checkout-section">
            <h2>Resumo do Pedido</h2>
            <div class="cart-summary">
                
              
                <div class="item total">
                    <span>Total da Compra:  R${{ $totalPrice }}     </span>
                  <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
                </div>
            </div>
            <a href="/checkout">
            <button class="checkout-button">Finalizar Compra</button>
           </a>
        </div>
        @endif
   
    
</div>
