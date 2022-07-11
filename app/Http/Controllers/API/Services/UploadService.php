<?php

namespace App\Http\Controllers\API\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UploadService extends Controller
{


    public static function uploadImage(UploadedFile $image, string $path): string
    {

        $avatar_name = Str::random(30) . '.' . $image->getClientOriginalExtension();

        $image->move($path, $avatar_name);

        return $avatar_name;
    }
}
