<?php

namespace App\Http\Controllers;

use Cart;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCollection = Cart::getContent();

        $taxCondition = Cart::getCondition('VAT 18%');
        if ($taxCondition !== null) {
            $totalTax = (str_replace('%', '', $taxCondition->getValue()) / 100) * Cart::getSubTotal();
        } else {
            $totalTax = '';
        }
        return view('pages.cart', compact('cartCollection', 'totalTax', 'taxCondition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicate = Cart::get($request->id);

        if ($duplicate) {
            return redirect()->route('cart.index')->with('error', 'Item is already in your cart!');
        }

        Cart::add($request->id, $request->name, $request->price, $request->quantity)
            ->associate('App\Product');

        $condition = new CartCondition(array(
            'name' => 'VAT 18%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '18%',
        ));

        Cart::condition($condition);
        return redirect()->route('cart.index')->with('success', 'Item was added to your cart.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item has been removed!');
    }
}
