<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'discount_price' => 'nullable|numeric',
            'category' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category; // Changed to category_id if that's your column name
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('product', $imagename);
            $product->image = $imagename;
        }
        
        $product->save();

        return redirect()->route('admin.product') // Make sure this route exists
            ->with('success', 'Product added successfully!');
    }
}