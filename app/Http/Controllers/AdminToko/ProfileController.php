<?php

namespace App\Http\Controllers\AdminToko;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //
    public function index()
    {
      
        return view('admintoko.profile.index');
    }

    public function update($user, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        if($request->password)
        {
            if($request->password && $request->password_confirmation)
            {
                $validatedData['password'] = bcrypt($request->password);
            } else {
                Alert::error('Error','gagal mengupdate password. pastikan password baru dan konfirmasi password sama');
            }
        }

        User::where('id', $user)->update($validatedData);

        Alert::success('Berhasil','berhasil mengupdate profil');
        return back();
    }


    public function updatetoko($user, Request $request)
    {
        $cek_apakah_toko_ada = Toko::where('user_id', $user)->first();

        $validatedData = $request->validate([
            'name' => 'required',
            'no_rekening' => 'required',
            'bank' => 'required',
            'address' => 'required',
            'latitude' => '',
            'longitude' => '',
            'description' => '',
        ]);

        $validatedData['user_id'] = auth()->id();

        
        if($request->has('logo')) {
            
            $logo = $request->logo;
            $logoName = time() . $logo->getClientOriginalName();
            $logo->move('uploads/logo', $logoName);
            $validatedData['logo'] = $logoName;
        }

        


        if($cek_apakah_toko_ada)
        {
            $upload_path = public_path() . "/upload/logo";
            $image = $upload_path . $cek_apakah_toko_ada->logo;
            if(file_exists($image)){
                @unlink($image);
            }
            
            Toko::where('user_id', $user)->update($validatedData);
        } else {
            Toko::create($validatedData);
        }
        
        Alert::success('Berhasil','berhasil mengupdate profil');
        return back();
    }
}
