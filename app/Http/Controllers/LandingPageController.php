<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of resource.
     */
    public function index()
    {
        $products = Product::where('featured', true)->take(10)->inRandomOrder()->get();

        return view('pages.landing-page', compact('products'));
    }
}
