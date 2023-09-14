<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    //
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id ?? 0)
            ->where('status', 'process')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.carts', compact('carts'));
    }

    public function updateJumlah(Request $request, $idcart)
    {
        $cart =  Cart::find($idcart);

        $total = $cart->product->price * $request->jumlah;

        $cart->update(['total' => $total, 'jumlah' => $request->jumlah]);

        $carts = Cart::where('user_id', auth()->user()->id ?? 0)
            ->where('status', 'process')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'total_harga' =>  $cart->total,
            'total_bayar' => $carts->sum('total')
        ]);
    }

    public function destroy($cart)
    {
        Cart::destroy($cart);
        Alert::success('Berhasil', 'berhasil menghapus produk di keranjang !');
        return back();
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'jumlah' => 'required',
            'toko_id' => 'required',

        ]);

        if ($request->jumlah  < 5) {
            Alert::info("Maaf Minimal 5", "Harap pesan diatas 5 pcs");
            return back();
        }

        $product = Product::find($request->product_id);
        $conditionStock = $product->stock - $request->jumlah;
        if ($conditionStock <= 4) {
            Alert::error('Stok Kurang');
            return back();
        }

        if ($product->event) {
            $hargaProdukPromosi = ($product->price - ($product->event->diskon / 100) * $product->price) * $request->jumlah;
        } else {
            $hargaProdukPromosi = $request->jumlah * $request->price;
        }

        $data =
            [
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'jumlah' => $request->jumlah,
                'toko_id' => $request->toko_id,
                'total' => $hargaProdukPromosi,
            ];

        if ($request->catatan) {
            $data['catatan'] = $request->catatan;
        }

        Alert::success('Berhasil', 'berhasil menambahkan produk ke dalam keranjang');

        Cart::create($data);
        return back();
    }
}
