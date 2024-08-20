<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = (new \App\Models\Order)->where('user_id', Auth::id())->get();
        return view('order.index', compact('orders'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::all();
        return view('order.create', compact('products'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = (new \App\Models\Order)->where('user_id', Auth::id())
            ->whereNull('completed_at')
            ->first();

        if (!$order) {
            $order = (new \App\Models\Order)->create([
                'user_id' => Auth::id(),
                'total' => 0,
            ]);
        }

        $total = $order->total;

        foreach ($validated['products'] as $productData) {
            $product = (new \App\Models\Product)->find($productData['id']);
            $quantity = $productData['quantity'];
            $price = $product->price * $quantity;

            $order->orderProducts()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
                'order_id' => $order->id,
            ]);

            $total += $price;
        }

        $order->update(['total' => $total]);

        return redirect()->route('order.show', $order)->with('success', 'Product(s) added successfully!');
    }

    public function show(Order $order): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('order.show', compact('order'));
    }

    public function complete(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->update(['completed_at' => now()]);

        return redirect()->route('order.index')->with('success', 'Order completed successfully!');
    }
}
