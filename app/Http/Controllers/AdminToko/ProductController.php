<?php

namespace App\Http\Controllers\AdminToko;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Alert;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class ProductController extends Controller
{
    //
    public function index()
    {
        if (!auth()->user()->toko) {
            Alert::info('Toko Belum Ada', 'silakan mengupdate toko terlebih dahulu');
            return view('admintoko.profile.index');
        }
        $products = Product::where('user_id', auth()->id())->get();
        $categories = Category::all();
        return view('admintoko.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        return view('admintoko.products.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/image', $imageName);
            $validatedData['image'] = $imageName;
        }

        $validatedData['user_id'] = auth()->id();

        $product = Product::create($validatedData);

        $project = [
            'greeting' => 'Halo Kak 👋',
            'body' => 'PT.Singvlar Furniture telah menambahkan product ' . $product->name,
            'thanks' => 'Terima Kasih 😁',
            'actionText' => 'Lihat Produk',
            'actionURL' => url('/products', $product->id),
            'id' => 57
        ];
        $user = User::role('customer')->get();
        Notification::send($user, new EmailNotification($project));

        return back();
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/image', $imageName);
            $validatedData['image'] = $imageName;
        }

        $product->update($validatedData);

        $user = User::role('customer')->get();

        $project = [
            'greeting' => 'Halo Kak 👋',
            'body' => 'Product ' . $product->name . ' Telah Di Update',
            'thanks' => 'Terima Kasih 😁',
            'actionText' => 'Lihat Produk',
            'actionURL' => url('/products', $product->id),
            'id' => 57
        ];

        Notification::send($user, new EmailNotification($project));

        FacadesAlert::success("Berhasil 😁", "Berhasil update barang");
        return back();
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            unlink(public_path('/uploads/image/' . $product->image));
        }
        Product::destroy($product->id);

        return back();
    }
}
