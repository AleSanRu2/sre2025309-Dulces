@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? __('Show') . " " . __('Product') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light" style="background-color: #032830; display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-light btn-md" href="{{ route('products.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-md-4 mb20">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group mb-md-4 mb20">
                            <strong>Descripción:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group mb-md-4 mb20">
                            <strong>Imagen:</strong>
                            {{ $product->image }}
                        </div>
                        <div class="form-group mb-md-4 mb20">
                            <strong>Precio:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group mb-md-4 mb20">
                            <strong>Stock:</strong>
                            {{ $product->stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
