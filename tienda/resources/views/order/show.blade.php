@extends('layouts.app')

@section('template_title')
    Order Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span id="card_title">
                            {{ __('Detalle del Pedido') }}
                        </span>
                    </div>

                    <div class="card-body">
                        <h5>Total: ${{ $order->total }}</h5>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->orderProducts as $orderProduct)
                                    <tr>
                                        <td>{{ $orderProduct->product->name }}</td>
                                        <td>{{ $orderProduct->quantity }}</td>
                                        <td>${{ $orderProduct->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ route('order.complete', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success mt-3">{{ __('Completar Compra') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
