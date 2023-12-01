
 @extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Compras
                 
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filtrar pela Data</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filtrar por Status</label>
                            <select name="status" class="form-select">
                                <option value="">Selecionar Status</option>
                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':''}}>Em Progresso</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':''}}>Completo</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':''}}>Pendente</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':''}}>Cancelado</option>
                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':''}}>A caminho da entrega</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button  type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>ID da Compra</th>
                                <th>Código</th>
                                <th>Usuário</th>
                                <th>Modo de Pagamento</th>
                                <th>Data da Compra</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders  as $orderItem)
                            <tr>
                                <td>{{ $orderItem->id }}</td>
                                <td>{{ $orderItem->tracking_no }}</td>
                                <td>{{ $orderItem->fullname }}</td>
                                <td>{{ $orderItem->payment_mode }}</td>
                                <td>{{ $orderItem->created_at->format('d-m-Y') }}</td>
                                <td>{{ $orderItem->status_message }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $orderItem->id) }}" class="btn btn-primary">Ver</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Nenhum produto disponível</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center p-5">
                        {{ $orders->appends(['date' => Request::get('date'), 'status' => Request::get('status')])->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
