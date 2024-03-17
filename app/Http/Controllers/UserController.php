<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    /* public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } */
 
    public function adminLogin(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        if ($user->status == 2) { // Check if the user is an admin
            return redirect()->intended('/admin');
        } else {
            return back()->withErrors(['email' => 'You are not authorized to access admin panel.']);
        }
    } else {
        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
  


/*
public function adminLogin(Request $request)
    {
        //These credentials do not match our records.
        $attributes = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);    
        } else {
           if (Hash::check($attributes['password'], $user->password)) {
            return redirect('/admin');
            }
            else {
                return back()->withErrors(['email' => 'These credentials do not match our records.']);    
            }
        }
    } */

//---------------------------------------

    public function imageStore(Request $request)
{
    $request->validate([
        'image.*' => 'required|image|mimes:jpeg,jpg,png,jpg,gif|max:2048',
    ]);


    foreach ($request->image as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);
        $imagePaths[] = $imageName;
    }

    $user = User::find(4);

    $user->update(['body_image' => $imagePaths]);

    $user->save();

    return redirect()->back()->withSuccess('Images uploaded successfully.')->with('image', $imagePaths);
} 
    
}
