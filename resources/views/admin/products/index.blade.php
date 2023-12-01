@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Produtos
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Adicionar Produtos</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->category)
                                        {{ $product->category->name }}
                                    @else
                                        Sem Categoria
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Escondido' : 'Visível'}}</td>
                                <td>
                                    <a href="{{ url ('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success">Editar</a>
                                    <a href="{{ url('admin/products/'.$product->id.'/delete' )}}" onclick="return confirm('Você tem certeza que quer deletar esse produto ?')" class="btn btn-sm btn-danger">
                                    Deletar</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Nenhum produto disponível</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
