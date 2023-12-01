<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Fatura #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: rgb(190,153,58);
            color: #fff;
        }
    </style>
   
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Spotlight+</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>ID da Fatura: #{{ $order->id }}</span> <br>
                    <span>Data: {{ date('d / m / Y') }}</span> <br>
                    <span>Código : {{ $order->pincode }}</span> <br>
                    <span>Endereço: {{ $order->address }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Detalhes da Compra</th>
                <th width="50%" colspan="2">Detalhes do Usuário</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID da Compra:</td>
                <td>{{ $order->id }}</td>

                <td>Nome Completo:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $order->tracking_no }}</td>

                <td>Email:</td>
                <td>{{  $order->email }}</td>
            </tr>
            <tr>
                <td>Data da Compra:</td>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>

                <td>Telefone:</td>
                <td>{{  $order->phone }}</td>
            </tr>
            <tr>
                <td>Metódo de Pagamento:</td>
                <td>{{ $order->payment_mode }}</td>

                <td>Endereço:</td>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <td>Status da Compra:</td>
                <td>{{ $order->status_message }}</td>

                <td>PIN:</td>
                <td>{{  $order->pincode }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                  Itens da Compra
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalPrice = 0;
            @endphp
            @forelse ($order->orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->product->id }}</td>
             
                <td>{{ $orderItem->product->name }}</td>
                <td>R${{ $orderItem->price}}</td>
                <td>{{ $orderItem->quantity}}</td>
                
                <td>R${{ $orderItem->quantity * $orderItem->price }}</td>
               
           
            </tr>
           
           
            @empty
            <tr>
                <td colspan="5">Nenhum produto adicionado no carrinho.</td>
            </tr>
            @endforelse
            @php
            $totalPrice += $orderItem->quantity * $orderItem->price;
            @endphp
          
                <td colspan="4" class="total-heading">Total da Compra - <small>Inc. todas as taxas</small> :</td>
                <td colspan="1" class="total-heading"> R${{ $totalPrice }}</td>
           
        </tbody>
    </table>

    <br>
    <p class="text-center">
      Obrigado por compra na Spotlight+!
    </p>

</body>
</html>