<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // 254
        $daftarKota = RajaOngkir::kota()->all();
        return view('auth.register', compact('daftarKota'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'no_telepon' => ['required'],
            'nama_perusahaan' => ['required'],
            'kabupatenkota' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nama_perusahaan' => $request->nama_perusahaan,
            'no_telepon' => $request->no_telepon,
            'password' => Hash::make($request->password),
            'kabupatenkota_id' => $request->kabupatenkota
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        Auth::login($user);

        if ($request->role == 'admintoko') {
            return redirect(RouteServiceProvider::DASHBOARD);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
