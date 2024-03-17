<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Region;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrainerProfileController extends Controller
{

    public function index($id)
    {
        $trainer = User::findOrFail($id);
        return view('user.trainers.profile',[
            'trainer' => User::where('id',auth()->id())->first(),
            'sports' => Sport::where('id', '<>', $trainer->sport->id)->latest()->get(),
            'regions' => Region::where('id', '<>', $trainer->region->id)->latest()->get(),
            'courses' => Course::where('trainer_id', $trainer->id)->latest()->get(),    
        ]);
    }


    public function updateStatus(Request $request, $id)
    {
    $trainer = User::findOrFail($id);

    // Check if the checkbox is checked in the request
    $status = $request->has('status') ? 1 : 0;

    // Update the status column in your model
    $trainer->update(['available_status' => $status]);

    // If needed, you can return a response or redirect as appropriate
    return back()->with('success','Status Changed');
    }


    public function editPassword()
    {
        return view('user.trainers.change-password');
    }

    public function updatePassword(Request $request, $id)
    {
    $trainer = User::findOrFail($id);

    $attributes = request()->validate([
        'old_password' => 'required',
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Check if the old password matches the hashed password stored in the database
    if (!Hash::check($attributes['old_password'], $trainer->password)) {
        return back()->withErrors(['old_password' => 'The old password is incorrect.']);
    }
    elseif ($attributes['password'] === $attributes['old_password'])
    {
        return back()->withErrors(['password' => 'The new password cannot be the old password.']);
    }
    else{

    // Update the password with the new hashed password
    $trainer->update([
        'password' => Hash::make($attributes['password']),
    ]);

    return redirect('/trainer/'.$trainer->id.'/profile')->with('success', 'Password updated successfully');
}
}

public function updateDesc(Request $request, $id)
 {
    $trainer = User::findOrFail($id);

    $attributes = request()->validate([
        'description'=> 'required',
    ]); 

    $trainer->update($attributes);

    $trainer->save();

    return back()->with('success', 'Description updated');
 }

 public function updateImage(Request $request, $id) 
 {
    $attributes = request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');

    $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

    $image->storeAs('uploads', $imageName , 'public');

    $attributes['image'] = $imageName;

    $trainer= User::findOrFail($id);

    $trainer->update([
        
        'image' => $attributes['image'],
    ]);

    $trainer->save();

    return back()->with('success', 'Image changed successfully');
 }

public function updateDetail(Request $request, $id)
 {
    $trainer = User::findOrFail($id);

    $attributes = request()->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:10'],
            'last_name' => ['required', 'string', 'min:3', 'max:10'],
            'birth_date' => 'required' ,'date', 'before_or_equal:',
            'gender' => ['required'],
            'phone' => ['required', 'numeric'],
            'height' => ['required','numeric', 'min:50', 'max:200'],
            'weight' => ['required','numeric', 'min:50', 'max:300'],
            'region' => ['required' , 'not_in:0'],
            'township' => ['required', 'string','min:3', 'max:255'],
            'hourly_rate' => ['required','numeric', 'min:5', 'max:1000'],
            'address' => ['required', 'string','min:3', 'max:255'],
            'specialization' => ['required' , 'not_in:0'],
            'experience' => ['required', 'numeric'],
            'current_gym' => ['required', 'string'],
            
    ]);

    $trainer->update([
        'first_name' => $attributes['first_name'],
        'last_name' => $attributes['last_name'],
        'birth_date' => $attributes['birth_date'],
        'gender'=> $attributes['gender'],
        'phone' => $attributes['phone'],
        'height' => $attributes['height'],
        'weight' => $attributes['weight'],
        'region_id' => $attributes['region'],
        'township'=> $attributes['township'],
        'hourly_rate'=> $attributes['hourly_rate'],
        'current_gym'=> $attributes['current_gym'],
        'sport_id' => $attributes['specialization'],
        'experience' => $attributes['experience'],
        'address' => $attributes['address'],
    ]);

    $trainer->save();

    return back()->with('success', 'Detail Info updated');

    }
 
    /* public function editEmail(Request $request, $id) {

        $trainer = User::findOrFail($id);

        $attributes = request()->validate([
            'password' => 'required', 'string', 'min:8',
        ]);
        if (!Hash::check($attributes['password'], $trainer->password)) {
            return back()->with('password', 'Wrong Password');
        }
        else {
            return view('user.trainers.change-email');
        }
    } */

    public function editEmail($id) 
    {
        $trainer = User::findOrFail($id);
        return view('user.trainers.change-email');
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

    return redirect('/trainer/'.$id.'/profile')->with('success', 'Email updated successfully');
}

public function changeFacebook(Request $request, $id)
{
    $trainer = User::findOrFail($id);

    $attributes = request()->validate([
        'facebook' => ['required', 'string', 'max:200', 'min:13'],
    ]);

    $trainer->update([
        'facebook'=> $attributes['facebook'],
        ]);

        $trainer->save();

        return back()->with('success', 'Facebook link changed');
}

public function changeInstagram(Request $request, $id)
{
    $trainer = User::findOrFail($id);

    $attributes = request()->validate([
        'instagram' => ['required', 'string', 'max:200', 'min:13'],
    ]);

    $trainer->update([
        'instagram'=> $attributes['instagram'],
        ]);

        $trainer->save();

        return back()->with('success', 'Instagram link changed');
}

public function destroy($id) {
    $trainer = User::findOrFail($id);

    $trainer->delete();

    return response()->json(['success' => true, 'message' => 'Account deleted successfully']);  
}

         
}
