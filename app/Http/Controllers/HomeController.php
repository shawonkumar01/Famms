<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(9);
        return view("home.userpage", compact("products"));
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view("home.product_details", compact("product"));
    }
    public function add_cart($id)
    {
        if (!Auth::check()) {
            return redirect("login");
        }

        // Proceed with adding to cart
        $user = Auth::user();
        $product = Product::find($id); // assuming your model is Product
      

         return redirect()->route("home.userpage")->with('success', 'Product added to cart!');

    }
}

