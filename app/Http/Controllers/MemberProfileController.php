<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberProfileController extends Controller
{
    public function index($id)
    {
        $member = User::findOrFail($id);
        return view('user.members.profile',[
            'member' => User::where('id',auth()->id())->first(),
        ]);
    }

    public function updateDetail(Request $request, $id)
 {
    $member = User::findOrFail($id);

    $attributes = request()->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:10'],
            'last_name' => ['required', 'string', 'min:3', 'max:10'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string','min:3', 'max:255'],
    ]);

    $member->update([
        'first_name' => $attributes['first_name'],
        'last_name' => $attributes['last_name'],
        'phone' => $attributes['phone'],
        'address' => $attributes['address'],
    ]);

    $member->save();

    return back()->with('success', 'Detail Info updated');

    }

    public function updateDesc(Request $request, $id)
    {
    $member = User::findOrFail($id);

    $attributes = request()->validate([
        'description'=> 'required',
    ]); 

    $member->update($attributes);

    $member->save();

    return back()->with('success', 'Description updated');
    }

    public function editPassword()
    {
        return view('user.members.change-password');
    }

    public function updatePassword(Request $request, $id)
    {
    $member = User::findOrFail($id);

    $attributes = request()->validate([
        'old_password' => 'required',
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Check if the old password matches the hashed password stored in the database
    if (!Hash::check($attributes['old_password'], $member->password)) {
        return back()->withErrors(['old_password' => 'The old password is incorrect.']);
    }
    elseif ($attributes['password'] === $attributes['old_password'])
    {
        return back()->withErrors(['password' => 'The new password cannot be the old password.']);
    }
    else{

    // Update the password with the new hashed password
    $member->update([
        'password' => Hash::make($attributes['password']),
    ]);

    return redirect('/member/'.$member->id.'/profile')->with('success', 'Password updated successfully');
}
}



    public function editEmail($id) 
    {
        $trainer = User::findOrFail($id);
        return view('user.members.change-email');
    }

    public function updateEmail(Request $request, $id)
{
    $trainer = User::findOrFail($id);

    $attributes = request()->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'min:13', 'unique:users'],
    ]);

    $trainer->update([
        'email' => $attributes['email'],
    ]);

    $trainer->save();

    return redirect('/member/'.$id.'/profile')->with('success', 'Email updated successfully');
}


    public function updateImage(Request $request, $id) 
 {
    $attributes = request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');

    $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

    $image->move(public_path('uploads'), $imageName);

    $attributes['image'] = $imageName;

    $member = User::findOrFail($id);

    $member->update([
        'image' => $attributes['image'],
    ]);

    $member->save();

    return back()->with('success', 'Image changed successfully');
 }
}
