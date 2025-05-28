<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public static function upload($image, $folderName)
    {
        $fileName = 'image_' . now()->format('YmdHisu') . '.' . $image->getClientOriginalExtension();
        $image->storeAs($folderName, $fileName, 'public');
        return $folderName . '/' . $fileName;
    }
}
