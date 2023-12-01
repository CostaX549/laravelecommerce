<div>
    <br>
    <div class="checkout">
        <div class="container">
            <h4>Comprar</h4>
          
            @if (!$orderPlaced && $this->totalProductAmount != 0)
            <div class="checkout-box" style="border-radius: 5px;">
                <h4 class="text-primary">
                    Total da Compra:
                    <span class="float-end">R${{ $this->totalProductAmount }}</span>
                </h4>
               <hr>
                <small>* Produtos vão ser entregues em  3 a 5 dias.</small>
                <br>
                <small>* Tax and other charges are included?</small>
            </div>

            <div class="checkout-box" style="border-radius: 5px;">
                <h4 class="text-primary">
                  Informações Básicas
                </h4>
                <hr>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="fullname">Nome Completo</label>
                        <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Nome Completo" />
                        @error('fullname')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Número de Telefone</label>
                        <input type="tel" wire:model.defer="phone" id="phone" class="form-control" placeholder="Número de Telefone" />
                        @error('phone')
                        <small style="color: red;">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email"  wire:model.defer="email" id="email" class="form-control" placeholder="E-mail" />
                        @error('email')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pin-code (Zip-code)</label>
                        <input type="number"  wire:model.defer="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" />
                        @error('pincode')
                        <small style="color: red;">{{ $message }}</small>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço Completo</label>
                        <textarea  wire:model.defer="address" id="address" class="form-control" rows="4"></textarea>
                        @error('address')
                        <small style="color: red;">{{ $message }}</small>
                       @enderror
                    </div>
                    <div wire:ignore>
                    <div class="form-group">
                        <label>Selecione o metódo de pagamento:</label>
                        <div class="payment-mode">
                            <button  wire:loading.attr="disabled" type="button" class="payment-button" data-value="Cash on Delivery">Pagamento na Entrega</button>
                            <button wire:loading.attr="disabled" type="button" class="payment-button" data-value="Online Payment">Pagamento Online</button>
                        </div>
                    </div>
                    
                    <div id="cashOnDeliveryMode" style="display: none;">
                        <h2>Modo de Pagamento na Entrega</h2>
                        <hr>
                        
                        <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="payment-button">
                           
                            Finalizar Pedido (Pagamento na Entrega)
                      
                        
                        
                       

                        </button>
                
                    </div>
                    
                    <div id="onlinePaymentMode" style="display: none;">
                        <h2>Modo de Pagamento Online</h2>
                        <hr>
                       {{--  <button type="button"  wire:loading.attr="disabled"  class="online-payment-button">Pague Agora (Pagamento Online)</button> --}}
                       <div>
                       <div id="paypal-button-container"></div>
                    </div>
                    <div>
                        <div class="" id="result-message"></div>
                    </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    @else
    <div id="trending" class="no-products">Nenhum item para comprar.</div> 
  
    @endif
    
        
</div>

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AeWnrfIe0iqFrKZxVGGhbn9l9SwdgUAO90LJB-bP8i3ubeHdC7LzH2b7zjHeHSxODvp775m_-1cztzVQ&currency=BRL"></script>

<script>
    paypal
      .Buttons({
        onClick() {
          // Show a validation error if the checkbox is not checked
          if (
            !document.getElementById('fullname').value ||
            !document.getElementById('phone').value ||
            !document.getElementById('email').value ||
            !document.getElementById('pincode').value ||
            !document.getElementById('address').value
          ) {
            Livewire.dispatch('validationForAll');
            return false;
          } else {
            @this.set('fullname', document.getElementById('fullname').value);
            @this.set('email', document.getElementById('email').value);
            @this.set('phone', document.getElementById('phone').value);
            @this.set('pincode', document.getElementById('pincode').value);
            @this.set('address', document.getElementById('address').value);
          }
        },
        createOrder: function (data, actions) {
          return actions.order.create({
            purchase_units: [
              {
                amount: {
                  value: "{{ $this->totalProductAmount }}", // Substitua pelo valor total da compra
                },
              },
            ],
          });
        },
        onApprove: function (data, actions) {
          return actions.order.capture().then(function (orderData) {
            // O pagamento foi aprovado com sucesso
            // Você pode exibir uma mensagem de sucesso ou redirecionar o usuário para uma página de agradecimento
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            if (transaction.status == 'COMPLETED') {
                Livewire.dispatch('transactionEmit', {
                            transactionId: transaction.id
                        }); 
              console.log(orderData);
            }
            
          });
        },
       
      })
      .render('#paypal-button-container');
  </script>
  
@endpush
