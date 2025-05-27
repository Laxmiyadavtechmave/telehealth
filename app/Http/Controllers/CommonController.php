<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function statusBg($status)
    {
         switch ($status) {
            case 'active':
                return 'bg-soft-success';
            case 'inactive':
                return 'bg-soft-danger';
            default:
                return 'bg-outline-info';
        }
    }

}
