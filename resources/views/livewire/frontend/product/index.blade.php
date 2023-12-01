

<div>
    
   
          
            
     
     

     


<section  id="trending" style="margin-top: 25px;">

    <div class="center-text">
       <h2>Nossos Produtos da Categoria: <span>{{ $category->name }}</span></h2>
    </div>
 
    <div class="products">
     @forelse($products as $productItem)
     
       <div class="row">
         <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">   
           <img src="{{ asset($productItem->productImages[0]->image) }}" alt="">
         </a>
           <div class="product-text">
             @if($productItem->quantity > 0)
               <h5>Em estoque</h5>
               @else
               <h5 style="background-color: red;">Fora de estoque</h5>
               @endif
           </div>
          
           <div class="ratting">
               <i class='bx bx-star'></i>
               <i class='bx bx-star'></i>
               <i class='bx bx-star'></i>
               <i class='bx bx-star'></i>
               <i class='bx bxs-star-half'></i>
           </div>
           <div class="price">
               <h4>{{ $productItem->name }}</h4>
               <p>R$ {{ $productItem->selling_price }}</p>
           </div>
       </div>
       @empty
       <div class="no-products">Nenhum produto adicionado a essa categoria.</div>
       @endforelse
   
    </div> 
 </section>
         


</div> 
           
                
  



