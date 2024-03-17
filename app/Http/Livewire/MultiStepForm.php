<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $first_name;
    public $last_name;
    public $birth_date;
    public $gender;
    public $height;
    public $weight;
    public $image;
    public $phone;
    public $region;
    public $township;
    public $address;
    public $description;
    public $specialization;
    public $experience;
    public $hourly_rate;
    public $body_image = [];    
    public $current_gym;
    public $certification = [];
    public $email;
    public $cv_form;
    public $facebook;
    public $instagram;
    public $agree;
    public $password; 
    public $password_confirmation;

    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount() {
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }

    public function increaseStep() 
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep =   $this->totalSteps;
        }
    }

    public function decreaseStep() 
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'first_name'=> 'required|string',
                'last_name'=> 'required|string',
                'birth_date' => 'required|date',
                'gender'=> 'required|integer|in:1,2',
                'height'=> 'required|numeric|min:0|max:300',
                'weight'=> 'required|numeric|min:0|max:300',
                'image' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif',
                'phone' => 'required|numeric',
                'region' => 'required|not_in:0',
                'township' => 'required|string',
                'address' => 'required|string',
            ]);
        }
        elseif ($this->currentStep == 2) {
            $this->validate([
                'experience'=> 'required|numeric',
                'specialization'=> 'required|not_in:0',
                'hourly_rate' => 'required|numeric',
                'current_gym'=> 'nullable|min:3|string',
                'body_image.*' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif',
                'certification.*' => 'required|image|max:2048|mimes:jpeg,png,jpg,gif',
                'description' => 'nullable|min:3|string',
            ]);
        }
        elseif ($this->currentStep == 3) {
            $this->validate([
                'facebook' => 'nullable|min:15',
                'instagram' => 'nullable|min:15',
                'cv_form' => 'required|mimes:doc,docx,pdf|max:2048',
                'agree' => 'accepted'
            ]);
        }
        elseif ($this->currentStep == 4) {
            $this->validate([
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
        }
        
    }


    public function register() {
        $this->resetErrorBag();
        if($this->currentStep == $this->totalSteps) {
            $this->validateData();


            $currentYear = now()->year;

            try {
                $image = time() . '_' . $this->image->getClientOriginalName();
                $uploaded_image = $this->image->storeAs('uploads' , $image , 'public');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

            $imagePaths = [];

            foreach ($this->body_image as $body_image) {
                $imageName = time() . '_' . $body_image->getClientOriginalName();
                $body_image->storeAs('uploads' , $imageName , 'public');
                $imagePaths[] = $imageName;
            }

            $certifiedImagePaths = [];

            foreach ($this->certification as $certi) {
                $certiName = time() . '_' . $certi->getClientOriginalName();
                $certi->storeAs('uploads', $certiName , 'public');
                $certifiedImagePaths[] = $certiName;
            }

            try {
                $cv_form = time() . '_' . $this->cv_form->getClientOriginalName();
                 $this->cv_form->storeAs('uploads' , $cv_form , 'public');
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
            
            if($uploaded_image) {
            User::create([
                'name' => $this->first_name.  ' ' . $this->last_name,
                'first_name' => $this->first_name,
                'last_name'=> $this->last_name,
                'birth_date' => $this->birth_date,
                'age' => $currentYear - date('Y', strtotime($this->birth_date)),
                'gender' => $this->gender,
                'height' => $this->height,
                'weight' => $this->weight,
                'image' => $image,
                 'phone'=> $this->phone,
                 'region_id' => $this->region,
                 'township' => $this->township,
                'address'=> $this->address,
                'experience' => $this->experience,
                'sport_id' => $this->specialization,
                'hourly_rate' => $this->hourly_rate,
                'current_gym' => $this->current_gym,
                'body_image' => json_encode($imagePaths),
                'certification' => json_encode($certifiedImagePaths),
                'description' => $this->description,
                'cv_form' => $cv_form,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'email'=> $this->email,
                'password' => Hash::make($this->password),
                'status' => 1,
            ]);

            return redirect('/register-success');
        }
        } 
    }

    
}

