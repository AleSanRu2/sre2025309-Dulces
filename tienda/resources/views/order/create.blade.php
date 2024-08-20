@extends('layouts.app')

@section('template_title')
    Create Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <span id="card_title">
                            {{ __('Nuevo Pedido') }}
                        </span>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <input type="number" name="products[{{ $product->id }}][quantity]" value="1" min="1" class="form-control">
                                                <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">{{ __('Hacer Pedido') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
