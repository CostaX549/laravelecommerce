@extends('layouts.app')

@section('title', 'Minhas Compras')

@section('content')

<div class="container" id="trending">
    <h2 class="order-history">Minhas Compras</h2>

    <div class="order-list">
        @forelse ($orders as $orderItem)
            <div class="order-item">
                <div class="order-info">
                    <div class="order-field">
                        <span class="field-label">ID da Compra:</span>
                        <span class="field-value">{{ $orderItem->id }}</span>
                    </div>
                    <div class="order-field">
                        <span class="field-label">Código:</span>
                        <span class="field-value">{{ $orderItem->tracking_no }}</span>
                    </div>
                    <div class="order-field">
                        <span class="field-label">Usuário:</span>
                        <span class="field-value">{{ $orderItem->fullname }}</span>
                    </div>
                    <div class="order-field">
                        <span class="field-label">Método de Pagamento:</span>
                        <span class="field-value">{{ $orderItem->payment_mode }}</span>
                    </div>
                    <div class="order-field">
                        <span class="field-label">Data da Compra:</span>
                        <span class="field-value">{{ $orderItem->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="order-field">
                        <span class="field-label">Status:</span>
                        <span class="field-value">{{ $orderItem->status_message }}</span>
                    </div>
                </div>
                <div class="order-action">
                    <a href="{{ url('orders/'.$orderItem->id)}}" class="view-button">Ver</a>
                </div>
            </div>
        @empty
        <div class="no-products" style="margin: 0 auto;">Nenhuma compra disponível.</div>
        @endforelse
    </div>

    <div class="pagination">
        {{ $orders->links('vendor.pagination.simple-default') }}
    </div>
</div>

<style>
    /* Estilos padrão para telas maiores */
    .order-list {
        display: flex;
        flex-wrap: wrap;
    }

    .order-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 15px;
        margin: 10px;
        width: calc(33.33% - 20px);
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        background-color: rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .order-field {
        display: flex;
        margin-bottom: 5px;
    }

    .field-label {
        font-weight: bold;
        margin-right: 5px;
    }

    .field-value {
        flex-grow: 1;
    }

    .order-action {
        text-align: right;
        margin-top: 10px;
    }

    .view-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
    }

    .pagination {
        margin-top: 20px;
    }

    /* Estilos para telas menores (responsivo) */
    @media (max-width: 768px) {
        .order-item {
            width: calc(50% - 20px);
        }
    }

    @media (max-width: 576px) {
        .order-list {
            flex-direction: column;
        }

        .order-item {
            width: 100%;
        }
    }
</style>

@endsection