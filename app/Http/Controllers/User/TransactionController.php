<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaction;
use App\Notifications\AdminNotification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Notification;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id ?? 0)
            ->where('status', 'process')
            ->orderBy('created_at', 'desc')
            ->get() ?? null;
        $transactions = Transaction::where('user_id', auth()->id())->get();
        return view('public.transactions', compact('carts', 'transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'image|max:2048'
        ]);
        $buktiPembayaranName = null;
        if ($request->has('bukti_pembayaran')) {
            $buktiPembayaran = $request->bukti_pembayaran;
            $buktiPembayaranName = time() . $buktiPembayaran->getClientOriginalName();
            $buktiPembayaran->move('uploads/buktiPembayaran', $buktiPembayaranName);
            // $validatedData['buktiPembayaran'] = $buktiPembayaranName;
        }

        if ($request->metode == 'transfer') {
            if ($buktiPembayaranName == null) {
                Alert::error('Gagal Checkout', 'jika memilih transfer harap upload bukti pembayaran');
                return back();
            }
        }

        $carts = Cart::with('product', 'toko')->where('toko_id', $request->toko_id)->where('user_id', auth()->id())->where('status', 'process')->get();

        foreach ($carts as $cart) {
            $product =  Product::where('id', $cart->product->id)->first();
            $product->update([
                "stock" => $product->stock - $cart->jumlah
            ]);
        }

        $toko = Toko::with('user')->where('id', $request->toko_id)->first();

        foreach ($carts as $cart) {
            $item[] = $cart->product->name;
        }

        $productsName = implode(",", $item);

        $details = [
            'nama' => auth()->user()->name,
            'alamat' => auth()->user()->alamat,
            'products' => $productsName
        ];

        // Notification::route('mail', $toko->user->email)->notify(new AdminNotification($details));

        Controller::sendWa("085757646864", "Hi Admin 👋, " . auth()->user()->name . " Memesan : $productsName " . "Yang Beralamat di " . auth()->user()->alamat);

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'toko_id' => $request->toko_id,
            'total' => $request->total,
            'metode' => $request->metode,
            'bukti_pembayaran' => $buktiPembayaranName,
            'ongkir' => $request->ongkir
        ]);

        $update = [
            'status' => 'checkout',
            'transaction_id' => $transaction->id,
        ];

        Cart::with('product', 'toko')->where('toko_id', $request->toko_id)->where('user_id', auth()->id())->where('status', 'process')->update($update);

        return redirect('/transactions');
    }
}
