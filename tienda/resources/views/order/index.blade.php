@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pedidos</h1>
        @foreach ($orders as $order)
            <div class="order">
                <h2>Pedido #{{ $order->id }} - Total: ${{ $order->total }}</h2>
                @foreach ($order->orderProducts as $orderProduct)
                    <p>Producto: {{ $orderProduct->product->name }}</p>
                    <p>Cantidad: {{ $orderProduct->quantity }}</p>
                    <p>Precio: ${{ $orderProduct->price }}</p>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
