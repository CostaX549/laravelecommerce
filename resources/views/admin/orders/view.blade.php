@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
            <a href="{{ url('admin/orders')}}" class="btn btn-danger btn-sm float-end mx-1 text-white">Voltar</a>
            <a href="{{ url('admin/invoice/'.$order->id.'/generate')}}" class="btn btn-primary btn-sm float-end mx-1 text-white">Baixar a fatura</a>   
            <a href="{{ url('admin/invoice/'.$order->id)}}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">Ver a fatura</a>   
        </div>
            <div class="card-header">
                <h4>Informações do Comprador</h4>
            
            </div>
            <div class="card-body">
                <p><strong>Nome Completo:</strong> {{ $order->fullname }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Número de Telefone:</strong> {{ $order->phone }}</p>
                <p><strong>PIN:</strong> {{ $order->pincode }}</p>
                <p><strong>Endereço:</strong> {{ $order->address }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin">
       
        <div class="card">
            <div class="card-header">
                <h4>Informações da Compra</h4>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $order->id }}</p>
                <p><strong>Método de Pagamento:</strong> {{ $order->payment_mode }}</p>
                <p><strong>Status:</strong> {{ $order->status_message }}</p>
                <p><strong>Data da Compra:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin">
       
        <div class="card">
            <div class="card-header">
                <h4>Produtos</h4>
            </div>
            @php
            $totalPrice = 0;
            @endphp
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Imagem</th>
                                <th>Cor</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order->orderItems as $orderItem)
                            <tr>
                                <td>{{ $orderItem->product->name }}</td>
                                <td>
                                    @if($orderItem->product->productImages->count() > 0)
                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}" alt="Imagem do Produto" style="object-fit: cover;" >
                                    @endif
                                </td>
                                <td>
                                    @if($orderItem->productColor)
                                    <label class="color-label" style="background-color: {{ $orderItem->productColor->color->code }};">
                                        {{ $orderItem->productColor->color->name }}
                                    </label>
                                    @endif
                                </td>
                                <td>R${{ $orderItem->price }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>R${{ $orderItem->quantity * $orderItem->price }}</td>
                            </tr>
                            @php
                            $totalPrice += $orderItem->quantity * $orderItem->price;
                            @endphp
                            @empty
                            <tr>
                                <td colspan="5">Nenhum produto adicionado no carrinho.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <h4 class="pt-2">Total da Compra: R${{ $totalPrice }}</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Processo de Compra (Atualizar o status da compra)</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('/admin/orders/'.$order->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="">Edite o status da compra</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Selecione o status da compra</option>
                                    <option value="in progress">Em Progresso</option>
                                    <option value="completed" >Completo</option>
                                    <option value="pending" >Pendente</option>
                                    <option value="cancelled" >Cancelado</option>
                                    <option value="out-for-delivery">A caminho da entrega</option>
                                </select>
                                <button  type="submit" class="btn btn-primary text-white">Editar</button>
                            </div>
                           
                        </form>
                    </div>
                    <div class="col-md-7">
                           <br>
                           <h4 class="mt-3">Atual status da compra: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
