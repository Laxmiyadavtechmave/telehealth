<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function patients()
    {
        return view('admin.patients');
    }

     public function doctors()
    {
        return view('admin.doctors.index');
    }

     public function doctorDetail()
    {
        return view('admin.doctors.detail');
    }
}
