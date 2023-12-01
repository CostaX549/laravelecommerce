@extends('layouts.app')

@section('title', 'Detalhes da Minha Compra')





@section('content')

<div>
    

    <br>
    <br>
    <br>
    <br>
    <h2 class="orderItems-history">Suas Informações</h2>


    <div class="checkout-section" style="border: none; width: 80%;">
              
        <div class="cart-summary" style="border-radius: 10px;">
            
          
            <div class="item total">
                <span>Nome Completo:  {{ $order->fullname }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>
            <div class="item total">
                <span>Email:  {{ $order->email }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>

            <div class="item total">
                <span style="font-size: 25px;">Número de Telefone:  {{ $order->phone }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>
            <div class="item total">
                <span style="font-size: 25px;">PIN:  {{ $order->pincode }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>
            <div class="item total">
                <span style="font-size: 25px;">Endereço:  {{ $order->address }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>
        </div>
      
    </div>

    <h2 class="orderItems-history">Informações da Compra</h2>

    <div class="checkout-section"  style="border: none; width: 80%;">
              
        <div class="cart-summary" style="border-radius: 10px;">
            
          
            <div class="item total">
                <span>ID:  {{ $order->id }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>
            <div class="item total">
                <span>Método de Pagamento:  {{ $order->payment_mode }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>

            <div class="item total">
                <span style="font-size: 25px;">Status:  {{ $order->status_message }}    </span>
                
          
              <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
            </div>

   
           
        </div>
      
    </div>
    <div class="container" id="trending"> <!-- Adicione o estilo inline para aplicar o padding -->
           @php
            $totalPrice = 0;
            @endphp
          @forelse ($order->orderItems as $orderItem)
              
     
       
        
            <div class="cart-item">
                <img src="{{ asset($orderItem->product->productImages[0]->image)}}">
                <div class="product-info">
                    <a href="">
                        <div class="product-name">{{ $orderItem->product->name}}</div>
                      
                    </a>    
               
                   
                    @if($orderItem->productColor)
                       
                    <label class="color-label" style="background-color: {{ $orderItem->productColor->color->code }};">
                        {{$orderItem->productColor->color->name}}
                    </label>
                    <br>
                   @endif
               
         
            <div class="price"></div>
            <div class="price">Preço do produto: R${{ $orderItem->price}}</div>
            <div class="price">Quantidade: {{ $orderItem->quantity}}</div>
            <div class="price">Total: R${{ $orderItem->quantity * $orderItem->price}} </div>
                  @php
                         $totalPrice += $orderItem->quantity * $orderItem->price;
                  @endphp
           
           
        
                </div>
                <div class = "product-rating">
       
                
                </div>
           
            </div>
            @empty
            <div class="no-products">Nenhum produto adicionado no carrinho.</div>
            @endforelse  

           
       
            <div class="checkout-section" style="border: none;">
              
                <div class="cart-summary">
                    
                  
                    <div class="item total">
                        <span>Total da Compra:  R${{ $totalPrice }}     </span>
                      <!-- Replace $totalPurchaseAmount with your actual total purchase amount -->
                    </div>
                </div>
              
            </div>

           
         
    </div>
    
 

    


@endsection
