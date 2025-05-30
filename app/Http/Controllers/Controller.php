<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function getAdminId()
    {
        $user = Auth::guard('clinic')->user();
        $clinicId = $user->clinic_id ?? $user->id;
    }
}
