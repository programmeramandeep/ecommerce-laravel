<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class ShopController extends Controller
{
 public function index()
 {
  $products   = Product::inRandomOrder()->take(6)->get();
  $categories = Category::all();

  return view('pages.shop', compact('products'));
 }

 public function show($slug)
 {
  $product = Product::where('slug', $slug)->firstOrFail();

  $relatedProducts = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

  return view('pages.product', compact('product', 'relatedProducts'));
 }
}
