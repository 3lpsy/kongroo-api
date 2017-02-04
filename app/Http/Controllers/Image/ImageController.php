<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image\Image;

class ImageController extends Controller
{
    public function show(Request $request, $imageId)
    {
        $image = Image::findOrFail($imageId);

        $pathToFile = $image->resolvePath();

        $name = $image->filename;

        $headers = [
            'Content-Type' => $image->mime ?: 'image/jpeg'
        ];
        
        return response()->download($pathToFile, $name, $headers);
    }
}
