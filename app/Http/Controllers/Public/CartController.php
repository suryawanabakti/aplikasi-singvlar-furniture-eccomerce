<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $title = 'Keranjang';
        return view('public.cart',compact('title'));
    }
}
