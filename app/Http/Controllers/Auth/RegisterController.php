<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {  
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'min:3', 'max:10'],
            'last_name' => ['required', 'string', 'min:3', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string','min:3', 'max:255'],
            'image' => ['required', 'image', 'max:2048' , 'mimes:jpeg,png,jpg,gif'],
        ]);
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {

        $image = $data['image'];

        $imageName = time() . '_' . $data['first_name'] . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        $data['image'] = $imageName;

        return User::create([
            'name' => $data['first_name']. ' ' .$data['last_name'] ,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'image'=> $data['image'],
            'password' => Hash::make($data['password']),
        ]);
   
} 
}
