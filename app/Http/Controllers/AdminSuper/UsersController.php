<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::role(['customer','admintoko'])->get();
        
        return view('adminsuper.users.index', compact('users'));
    }

    public function destroy(User $id)
    {
        if(!empty($id->toko->id)) {
            Transaction::where('toko_id', $id->toko->id)->delete();
        }
        Transaction::where('user_id', $id->id)->delete();
        User::destroy($id->id);
        Product::where('user_id' , $id->id)->delete();

        Toko::where('user_id', $id->id)->delete();
        
        Alert::success('Berhasil','berhasil menghapus users');
        return back();
    }

    public function updatepassword(Request $request,$id)
    {
        User::where('id',$id)->update([
            "password" => bcrypt($request->password)
        ]);

        
        return back();
    }
}
