<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        if (request()->limit) {
            $pagination = request()->limit;
        } else {
            $pagination = 9;
        }
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } elseif (request()->sort == 'name') {
            $products = $products->orderBy('name')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('pages.shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        if ($product->quantity > setting('site.stock_threshold')) {
            $stockLevel = '<div class="badge badge-success">In Stock</div>';
        } elseif ($product->quantity <= setting('site.stock_threshold') && $product->quantity > 0) {
            $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
        } else {
            $stockLevel = '<div class="badge badge-danger">Out of Stock</div>';
        }

        return view('pages.product', compact('product', 'relatedProducts', 'stockLevel'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3'
        ]);

        $query = $request->input('query');

        $products = Product::search($query)->paginate(12);

        return view('pages.search-results', compact('products'));
    }

    public function searchAlgolia(Request $request)
    {
        return view('pages.search-results-algolia');
    }
}
