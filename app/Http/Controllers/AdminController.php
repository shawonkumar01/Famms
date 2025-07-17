<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function show()
    {
        $data = Category::all();
        return view('admin.categories', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->name;
        $data->save();
        return redirect()->route('admin.categories')
            ->with('success', 'Category added successfully!');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->route('admin.categories')
            ->with('deleted', 'Category deleted successfully!');
    }

    public function view_product()
    {
        $categories = Category::all(); // Changed to plural for consistency
        return view('admin.product', compact('categories'));
    }

    public function store_product(Request $request)
    {


        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = (float) $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price ? (float) $request->discount_price : null;
        $product->category = $request->category;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            // Store in public disk
            $path = $image->storeAs('product', $imagename, 'public');
            $product->image = $imagename;
        }
        $product->save();
        return redirect()->route('admin.view_product')
            ->with('success', 'Product added successfully!');
    }

    public function show_product()
    {
        $products = Product::with('category')->get();
        return view('admin.show_product', compact('products'));
    }
    public function delete_product($id)
    {
        $product = Product::find($id);

        // Delete image file if exists
        if ($product->image) {
            $imagePath = public_path('storage/product/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('admin.show_product')
            ->with('deleted', 'Product deleted successfully!');
    }
    public function order()
    {
        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    public function delivery($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        $order->payment_status = "paid";
        $order->save();
        return redirect()->route("admin.order");
    }
    public function print_pdf($id)
    {
        $orders = Order::all();

        $pdf = Pdf::loadView('admin.orders_pdf', compact('orders'));

        return $pdf->download('orders.pdf');
    }
    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.send_email', compact('order'));
    }
    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::route('mail', $order->email)->notify(new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email Sent Successfully!');
    }
    public function search_data(Request $request)
    {
        $searchtext= $request->search;
        $order = Order::where('name', 'LIKE', "%{$searchtext}%")->get();

        return view('admin.order', compact('order'));
    
    }

}