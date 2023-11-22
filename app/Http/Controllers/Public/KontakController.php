<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Notifications\AdminNotification;
use App\Notifications\KontakNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class KontakController extends Controller
{
    //
    public function store(Request $request)
    {

        $details = [
            'email' => $request->no_wa,
            'message' => $request->message
        ];


        Notification::route('mail', $request->no_wa)->notify(new KontakNotification($details));
        Notification::route('mail', "ardhyansyah14m@gmail.com")->notify(new KontakNotification($details));

        Alert::success("Berhasil kirim pesan");
        return back();
    }
}
