@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')

@if($search)


 
<div class="container" id="trending" > <!-- Adicione o estilo inline para aplicar o padding -->
  <h2 style="padding-top: 50px; color: #fff;">Buscando por: {{ $search }}</h2>
  <hr style="margin-bottom: 15px;;">
   
  @forelse($products as $product)

  <div class="cart-item">
    
    @if(isset($product->productImages[0]))
    <img src="{{ $product->productImages[0]->image }}" alt="{{ $product->name }}">
@else
    <p>Nenhuma imagem disponível</p>
@endif
      <div class="product-info">
          <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug)}}">
              <div class="product-name">{{ $product->name }}</div>
             
          </a>
          <div class="price">R${{ $product->selling_price }}</div>
      </div>
    
  </div>

  @empty
  <div class="no-products">Nenhum produto encontrado na busca.</div>
  @endforelse

</div>
@else

<div id="myEcommerceCarousel" class="owl-carousel">
  @foreach($sliders as $sliderItem)
  <div class="item">
      <img src="{{ asset("$sliderItem->image") }}" alt="">
      <div class="text-overlay">
          <div class="main-text">
              <h5>Anúncios</h5>
              <h1>{{ $sliderItem->title }}</h1>
              <p>{{ $sliderItem->description }}</p>
              <a href="{{ $sliderItem->link }}" class="main-btn">{{ $sliderItem->text }}<i class='bx bx-right-arrow-alt'></i></a>
              <div class="down-arrow">
                <a href="#trending" class="down"><i class='bx bx-down-arrow-alt' ></i></a>
              </div>  
          </div>
          
      </div>
  </div>
  
@endforeach

</div>

     
<!--  Seção de produtos em tendência -->

<section class="trending-product" id="trending">

   <div class="center-text">
      <h2>Nossos Produtos  <span>em alta</span> </h2>
   </div>

   <div class="products">
    @foreach($products as $productItem)
      <div class="row">
  
        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">   
          @if(isset($productItem->productImages[0]))
          <img src="{{ asset($productItem->productImages[0]->image) }}" alt="">
          @endif
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
      @endforeach
  
   </div> 
</section>

<!--    Client-Review-section -->



<!-- update-news-section -->
<section class="Update-news">
<div class="up-center-text">
  <h2>Conecte-se com o universo fictício em questão de cliques.</h2>
</div>

<div class="update-cart">
  <div class="cart">
      <img src="/image/avengers4.jpg" alt="">
    
  </div>

  <div class="cart">
    <img src="/image/batman.jpg" alt="">
  
</div>
 
</div>
</section>
@endif

@endsection