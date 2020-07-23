<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $wish_list = app('wishlist');
        $wishListCollection = $wish_list->getContent();

        return view('pages.wishlist', compact('wishListCollection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Cart::get($request['id']);

        Cart::remove($request['id']);

        $duplicate = app('wishlist')->get($request['id']);

        if ($duplicate) {
            return redirect()->back()->with('error', 'Item is already in your wishlist!');
        }

        app('wishlist')->add($item->id, $item->name, $item->price, $item->quantity)
            ->associate('App\Product');

        return redirect()->back()->with('success', 'Item has been added to wishlist.');
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
        $wish_list = app('wishlist');

        $item = $wish_list->get($id);

        $wish_list->remove($id);

        Cart::add($item->id, $item->name, $item->price, $item->quantity)
            ->associate('App\Product');

        return redirect()->back()->with('success', 'Item has been moved to cart.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wish_list = app('wishlist');
        $wish_list->remove($id);

        return redirect()->route('wishlist.index')->with('success', 'Item has been removed from wishlist.');
    }
}
