<?php

namespace App\Models\Video\Source;

use App\Models\Model\Model;
use Illuminate\Support\Str;

class VideoSource extends Model
{
    protected $dir = "app/content/videos/";

    /**
     * Table Name
     * @var string
     */
    protected $model = "video_source";

    public function resolveUrlFromPivot($attribute = "video_id")
    {
        return route('api.video.video-source.show', [
            Str::camel($attribute) => $this->fromPivot($attribute),
            'videoSourceId' => $this->id
        ]);
    }

    public function resolvePath()
    {
        return storage_path($this->dir) .
            ($this->directory ? $this->directory . "/" : "") .
            $this->filename;
    }
}
