@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Lista de Cores
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm text-white float-end">Adicionar Cores</a>
                </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Cor</th>
                        <th>Cor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colors as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->status ? 'Escondido':'Visível' }}</td>
                        <td>
                            <a href="{{ url('admin/colors/'.$item->id.'/edit') }}" class="btn btn-success btn-sm" >Editar</a>
                            <a href="{{ url('admin/colors/'.$item->id.'/delete') }}" onclick="return confirm('Você tem certeza que quer deletar essa cor?')" class="btn btn-danger btn-sm">Deletar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
       