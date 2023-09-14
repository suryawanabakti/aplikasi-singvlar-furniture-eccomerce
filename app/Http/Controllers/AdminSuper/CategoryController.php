<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('adminsuper.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        Category::create($validatedData);
        return back();
    }

    public function update(Request $request, $id)
    {
        Category::find($id)->update(['name' => $request->name]);
        return back();
    }

    public function destroy($id)
    {
        $products = Product::where('category_id', $id)->get();
        foreach ($products as $pro) {
            Cart::where('product_id', $pro->id)->delete();
        }
        Product::where('category_id', $id)->delete();
        Category::destroy($id);
        return back();
    }
}
