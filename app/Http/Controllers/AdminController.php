<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function show()
    {
        $data=Category::all();
        return view('admin.categories',compact('data'));
    }

    public function store(Request $request)
    {
        $data=new Category();
        $data->category_name=$request->name;
        $data->save();
        return redirect()->route('admin.categories')
            ->with('success', 'Category added successfully!');
    }
     public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
       
        return redirect()->route('admin.categories')
            ->with('deleted', 'Category deleted successfully!');
    }
    public function store_product() 
    {
        return view('admin.product');
    }
}
