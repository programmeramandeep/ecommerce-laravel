<?php

namespace App\Http\Controllers;

use App\Coupon;
use Cart;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use Validator;

class CouponsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required|string|max:30'
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout.index')->withErrors($validator->errors());
        }

        $coupon_exist = Cart::getCondition(strtoupper($request->coupon_code));

        if ($coupon_exist) {
            return redirect()->route('checkout.index')->withErrors('Coupon already applied!');
        }

        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return redirect()->route('checkout.index')->withErrors('Invalid coupon code. Please try again!');
        }

        // add single condition on a cart bases
        $condition = new CartCondition(array(
            'name' => $coupon->code,
            'type' => 'coupon',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $coupon->discount(),
            'order' => 1
        ));

        Cart::condition($condition);

        return redirect()->route('checkout.index')->with('success', 'Coupon has been applied!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCondition($id)
    {
        Cart::removeCartCondition($id);

        session()->flash('success', 'Coupon has been removed successfully');
        return response()->json(['success' => true]);
    }
}
