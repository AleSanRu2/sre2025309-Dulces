@extends('layouts.app')

@section('template_title')
    {{ $orderProduct->name ?? __('Show') . " " . __('Order Product') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Order Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('order-products.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Order Id:</strong>
                            {{ $orderProduct->order_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Product Id:</strong>
                            {{ $orderProduct->product_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Quantity:</strong>
                            {{ $orderProduct->quantity }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Price:</strong>
                            {{ $orderProduct->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
