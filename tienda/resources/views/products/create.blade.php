@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Product
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header text-light" style="background-color: #032830">
                        <span class="card-title">{{ __('Nuevo') }} Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('products.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('products.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
