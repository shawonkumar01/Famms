<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
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
        $cart->product_title = $product->product_name;
        if ($product->discount_price != null) {
            $cart->price = $product->discount_price * $request->quantity;
        } else {
            $cart->price = $product->price * $request->quantity;
        }
        $cart->image = $product->image;
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;

        $cart->save();



        return redirect()->route("home.userpage")->with('success', 'Product added to cart!');

    }
    public function show_cart()
    {

        if (!Auth::check()) {
            return redirect("login");
        }
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', '=', $id)->get();
        return view('home.showcart', compact('cart'));
    }
    public function remove_cart($id)
    {
        $cartItem = Cart::find($id);
        $cartItem->delete();

        return redirect()->route('show_cart')->with('success', 'Item removed successfully!');

    }

    public function cash_order()
    {
        if (!Auth::check()) {
            return redirect("login");
        }

        $userid = Auth::user()->id;
        $data = Cart::where("user_id", "=", $userid)->get();

        foreach ($data as $data) {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->route('show_cart')->with('success', 'We have received your order!');

    }
    public function product_search(Request $request){

        $search_text= $request->search;
        $products = Product::where('product_name','LIKE','%'.$search_text.'%')->orWhere('category','Like','%'.$search_text.'%')->paginate(9);

        return view('home.userpage',compact('products'));
    }
    public function show_order(){

        if(Auth::id()){
            $user = Auth::user();  
            $userid= $user->id;

            $order= order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else{
            return redirect('login');
        }

    }


}

