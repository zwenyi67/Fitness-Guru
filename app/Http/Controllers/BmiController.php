<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function metric(Request $request) 
    {
        $attributes = request()->validate([
            'height' => 'required|numeric|max:255|min:70',
            'weight' => 'required|numeric|min:40',
        ]);

        $height = $attributes['height']/100;
        $weight = $attributes['weight'];

        $bmi = $weight / pow($height,2);


        
        if ($bmi < 18.5) {
            return back()->with(['under' => 'You are normal', 'bmi' => $bmi]);
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return back()->with(['normal' => 'You are normal', 'bmi' => $bmi] );
        } elseif ($bmi >= 25 && $bmi < 30) {
            return back()->with(['over' => 'You are normal', 'bmi' => $bmi]);
        } elseif($bmi >=30 && $bmi < 35) {
            return back()->with(['obese' => 'You are normal', 'bmi' => $bmi]);        
        }else {
            return back()->with(['exobese' => 'You are normal', 'bmi' => $bmi]);        
        }
    }

    public function imperial(Request $request) 
    {
        $attributes = request()->validate([
            'feet' => 'required|numeric|max:8|min:1',
            'inches' => 'required|numeric|max:12|min:0',
            'weight' => 'required|numeric|min:40',
        ]);

       

        $height = $attributes['inches']+$attributes['feet']*12;
        $weight = $attributes['weight'];

        $bmi = ($weight / pow($height,2)) * 703;
        
        if ($bmi < 18.5) {
            return back()->with(['under' => 'You are normal', 'bmi' => $bmi]);
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return back()->with(['normal' => 'You are normal', 'bmi' => $bmi] );
        } elseif ($bmi >= 25 && $bmi < 30) {
            return back()->with(['over' => 'You are normal', 'bmi' => $bmi]);
        } elseif($bmi >=30 && $bmi < 35) {
            return back()->with(['obese' => 'You are normal', 'bmi' => $bmi]);        
        }else {
            return back()->with(['exobese' => 'You are normal', 'bmi' => $bmi]);        
        }
    }
}
