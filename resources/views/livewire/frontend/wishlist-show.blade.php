<div>


    <div class="container" id="trending"> <!-- Adicione o estilo inline para aplicar o padding -->
        <h2 style="padding-top: 75px; color: #fff; text-align: center;">Lista de Desejos</h2>
        <hr style="margin-bottom: 15px;;">

            @forelse($wishlist as $wishlistItem)
            @if($wishlistItem->product)
            <div class="cart-item">
                <img src="{{ $wishlistItem->product->productImages[0]->image }}" alt="{{ $wishlistItem->product->name }}">
                <div class="product-info">
                    <a href="{{ url('/collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug)}}">
                        <div class="product-name">{{ $wishlistItem->product->name }}</div>
                       
                    </a>
                    <div class="price">R${{ $wishlistItem->product->selling_price }}</div>
                </div>
                <div class = "product-rating">
                
                    <a  class="view-button" style="margin: 5px; width: 100px;" href="{{ url('/collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug)}}">
                      Ver
                    </a>
            
                
                </div>
                <div class="remove">
                    <button type="button" wire:click.defer="removeWishlistItem({{ $wishlistItem->id }})" class="btn-remove">
                        <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                            <i class="fa fa-trash"></i> Remover
                        </span>
                        <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                            <i class="fa fa-trash"></i> Removendo...
                        </span>
                    </button>
                </div>
            </div>
            @endif
            @empty
            <div class="no-products">Nenhum produto adicionado na lista de desejos.</div>
            @endforelse
        
    </div>
   
            
</div>
