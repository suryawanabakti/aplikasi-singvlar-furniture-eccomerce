<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Home';
        $products = Product::paginate(12);
        if ($request->search) {
            $products = Product::where('name', 'LIKE', "%{$request->search}%")->paginate(12);
        }

        $categories = Category::all();
        $carts = Cart::where('user_id', auth()->user()->id ?? 0)
            ->where('status', 'process')
            ->orderBy('created_at', 'desc')
            ->get() ?? null;
        $banners = Banner::all();
        return view('public.products', compact('products', 'title', 'categories', 'carts', 'banners'));
    }

    public function beriRating(Request $request, $id)
    {

        $productRating = ProductRating::where('user_id', auth()->id())->where('product_id', $id)->first();
        if (empty($productRating)) {
            ProductRating::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'star' => $request->star,
                'komentar' => $request->komentar
            ]);
        } else {
            $productRating->update([
                'star' => $request->star,
                'komentar' => $request->komentar
            ]);
        }

        Alert::success("Berhasil", "Berhasil memberi rating produk");
        return back();
    }
}
