<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Http\Requests\OrderProductRequest;

/**
 * Class OrderProductController
 * @package App\Http\Controllers
 */
class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $orderProducts = OrderProduct::paginate();

        return view('order-products.index', compact('orderProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $orderProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orderProduct = new OrderProduct();
        return view('order-products.create', compact('orderProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderProductRequest $request)
    {
        OrderProduct::create($request->validated());

        return redirect()->route('order-products.index')
            ->with('success', 'OrderProduct created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orderProduct = OrderProduct::find($id);

        return view('order-products.show', compact('orderProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orderProduct = OrderProduct::find($id);

        return view('order-products.edit', compact('orderProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderProductRequest $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->validated());

        return redirect()->route('order-products.index')
            ->with('success', 'OrderProduct updated successfully');
    }

    public function destroy($id)
    {
        OrderProduct::find($id)->delete();

        return redirect()->route('order-products.index')
            ->with('success', 'OrderProduct deleted successfully');
    }
}
