<?php

namespace App\Http\Controllers;

use Cart;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Validator;

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

        $totalTax = 0;
        $taxCondition = Cart::getCondition('VAT 18%');
        if ($taxCondition !== null) {
            $totalTax = $taxCondition->getCalculatedValue(Cart::getSubTotal());
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

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
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
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,10'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', $validator->errors());
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, [
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            )
        ]);

        session()->flash('success', 'Quantity has been updated successfully');
        return response()->json(['success' => true]);
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
