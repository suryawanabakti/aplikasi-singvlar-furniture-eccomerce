<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    //
    public function index()
    {
        $tokos = Toko::all();

        return view('adminsuper.tokos.index', compact('tokos'));
    }

    public function destroy($toko)
    {
        $tokos = Toko::findOrFail($toko);
        Toko::destroy($toko);
        Transaction::where('toko_id', $toko)->delete();
        Product::where('user_id', $tokos->user_id)->delete();

        return back();
    }
}
