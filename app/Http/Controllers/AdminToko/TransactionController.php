<?php

namespace App\Http\Controllers\AdminToko;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Alert;

class TransactionController extends Controller
{
    //
    public function index()
    {
        if (!auth()->user()->toko) {
            Alert::info('Toko Belum Ada', 'silakan mengupdate toko terlebih dahulu');
            return view('admintoko.profile.index');
        }
        $transactions = Transaction::where('toko_id', auth()->user()->toko->id ?? 0)->orderBy('created_at', 'desc')->get();

        return view('admintoko.transactions.index', compact('transactions'));
    }

    public function print()
    {
        $transactions = Transaction::where('toko_id', auth()->user()->toko->id)
            ->where('status', 'success')
            ->get();

        return view('admintoko.transactions.print', compact('transactions'));
    }

    public function terima($id)
    {
        Transaction::find($id)->update(['status' => 'success']);

        return back();
    }
}
