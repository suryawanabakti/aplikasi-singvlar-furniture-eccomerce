<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::all();

        return view('adminsuper.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        if($request->has('image')) {
            $image = $request->image;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/image', $imageName);
            $validatedData['image'] = $imageName;
        }

        Banner::create($validatedData);

        return back();

    }
}
