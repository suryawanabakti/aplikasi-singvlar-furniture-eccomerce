<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chat;
use Illuminate\Http\Request;

class LiveChatController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id ?? 0)
            ->where('status', 'process')
            ->orderBy('created_at', 'desc')
            ->get() ?? null;

        $chats = Chat::orderBy('created_at', 'asc')->where(function ($query) {
            $query->where('user_id', auth()->id());
        })->take(15)->get();
        return view('public.livechat', compact('carts', 'chats'));
    }

    public function store(Request $request)
    {
        Chat::create([
            'user_id' => auth()->id(),
            'pesan' => $request->pesan,
            'isAdmin' => 0
        ]);

        return back();
    }
}
