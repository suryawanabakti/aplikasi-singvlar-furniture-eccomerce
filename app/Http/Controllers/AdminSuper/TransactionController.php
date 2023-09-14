<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::all();

        return view('adminsuper.transactions.index', compact('transactions'));
    }

    public function print()
    {
        $transactions = Transaction::all();

        return view('adminsuper.transactions.print', compact('transactions'));
    }
}
