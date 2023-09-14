<?php

namespace App\Http\Controllers\AdminToko;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    //
    public function send()
    {
    }

    public function index()
    {
        $events = Event::all();
        $products = Product::all();
        return view('admintoko.events.index', compact('events', 'products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'product_id' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'diskon' => 'required'
        ]);

        $event = Event::create($validatedData);

        $user = User::role('customer')->get();

        $project = [
            'greeting' => 'Halo Kak 👋',
            'body' => 'Promo ' .  $event->product->name . ". Dengan Diskon : $event->diskon. Mulai tanggal $event->tgl_mulai sampai $event->tgl_selesai",
            'thanks' => 'Terima Kasih 😁',
            'actionText' => 'Lihat Produk',
            'actionURL' => url('/products', $event->product_id),
            'id' => 57
        ];

        Notification::send($user, new EmailNotification($project));
        Alert::success("Berhasil", "berhasil menyimpan event");
        return back();
    }

    public function destroy($id)
    {
        Event::destroy($id);

        return back();
    }
}
