<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{


public function upload(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
 
        $save = new Photo;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();
 
    }
}
