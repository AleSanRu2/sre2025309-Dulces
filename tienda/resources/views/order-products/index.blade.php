@extends('layouts.app')

@section('template_title')
    Order Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order Product') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('order-products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Order Id</th>
										<th>Product Id</th>
										<th>Quantity</th>
										<th>Price</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderProducts as $orderProduct)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $orderProduct->order_id }}</td>
											<td>{{ $orderProduct->product_id }}</td>
											<td>{{ $orderProduct->quantity }}</td>
											<td>{{ $orderProduct->price }}</td>

                                            <td>
                                                <form action="{{ route('order-products.destroy',$orderProduct->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('order-products.show',$orderProduct->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('order-products.edit',$orderProduct->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $orderProducts->links() !!}
            </div>
        </div>
    </div>
@endsection
