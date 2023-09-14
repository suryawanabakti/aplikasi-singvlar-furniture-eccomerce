<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class AdminLiveChatController extends Controller
{
    public function index()
    {
        $chats = Chat::orderBy('created_at', 'asc')->take(15)->get();
        return view('admintoko.pengaduan.index', compact('chats'));
    }
}
