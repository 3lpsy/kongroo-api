<?php

namespace App\Models\Article\Section\Content\Video;

use App\Models\Article\Section\Content\Content;

class ContentVideo extends Content
{
    protected $model = 'content_video';

    public $type = "video";

    public $contentType = "content_video";

    public function video()
    {
        return $this->belongsTo(config("models.video.namespace"), "video_id");
    }

    public function attachContent($video)
    {
        $this->attachVideo($video);
    }

    public function attachVideo($video)
    {
        $this->video()->associate($video);
    }
}
