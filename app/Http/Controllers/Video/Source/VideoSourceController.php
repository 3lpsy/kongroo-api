<?php

namespace App\Http\Controllers\Video\Source;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video\Source\VideoSource;
use App\Models\Video\Video;

class VideoSourceController extends Controller
{
    public function show(Request $request, $videoId, $videoSourceId)
    {
        $video = Video::findOrFail($videoId);
        $source = $video->getSourceById((int) $videoSourceId);
        $pathToFile = $source->resolvePath();
        $name = $video->title;
        return response()->download($pathToFile, $name);
    }
}
