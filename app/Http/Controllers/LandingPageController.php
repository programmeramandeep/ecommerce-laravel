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
        $products = Product::inRandomOrder()->take(8)->get();

        return view('pages.landing-page', compact('products'));
    }
}
