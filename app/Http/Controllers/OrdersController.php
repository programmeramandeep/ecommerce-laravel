<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->with('products')->get();

        return view('pages.users.my-orders')->with([
            'user' => auth()->user(),
            'active' => 'orders',
            'orders' => $orders
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }

        $products = $order->products;

        return view('pages.users.my-order')->with([
            'user' => auth()->user(),
            'active' => 'orders',
            'order' => $order,
            'products' => $products,
        ]);
    }
}
