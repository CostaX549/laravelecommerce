[@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Usuários
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">Adicionar Usuário</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Cargo</th>
                               
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role_as == '0')
                                    <label class="badge btn-primary">Usuário</label>
                                    @elseif($user->role_as == '1')
                                    <label class="badge btn-success">Admin</label>
                                    @else
                                    <label class="badge btn-primary">Nenhum</label>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ url ('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">Editar</a>
                                    <a href="{{ url('admin/users/'.$user->id.'/delete' )}}" onclick="return confirm('Você tem certeza que quer deletar esse produto ?')" class="btn btn-sm btn-danger">
                                    Deletar</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Nenhum usuário disponível</td>
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
