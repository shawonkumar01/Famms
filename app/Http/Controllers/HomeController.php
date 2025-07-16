<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
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
    public function add_cart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect("login");
        }

        // Proceed with adding to cart
        $user = Auth::user();
        $product = Product::find($id); // assuming your model is Product
        
        $cart = new Cart();
        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->phone = $user->phone;
        $cart->address = $user->address;
        $cart->user_id = $user->id;
        $cart->product_title = $product->title;
        $cart->price = $product->price;
        $cart->image = $product->image;
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;

        $cart->save();



        return redirect()->route("home.userpage")->with('success', 'Product added to cart!');

    }
}

