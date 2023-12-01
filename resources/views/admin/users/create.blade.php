@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if($errors->any())
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
           <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Adicionar Usuário
                    <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/users')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nome</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Senha</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Cargo</label>
                           <select name="role_as" class="form-control p-3">
                            <option value="">Selecione o cargo</option>
                            <option value="0">Usuário</option>
                            <option value="1">Admin</option>
                           </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary text-white">Salvar</button>
                        </div>


                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection