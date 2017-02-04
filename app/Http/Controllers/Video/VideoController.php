<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video\Video;

class VideoController extends Controller
{
    public function show(Request $request, $videoId)
    {
        return false;
    }
}
