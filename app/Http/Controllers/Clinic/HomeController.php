<?php

namespace App\Http\Controllers\Clinic;

use App\Models\Nurse;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){

        $user = Auth::guard('clinic')->user();

        $patientCount = Patient::where('clinic_id',$user->id)->count();
        $doctorCount = Doctor::where('clinic_id',$user->id)->count();
        $nurseCount = Nurse::where('clinic_id',$user->id)->count();

        return view('clinic.dashboard',compact('user','patientCount','doctorCount','nurseCount'));
    }
}
