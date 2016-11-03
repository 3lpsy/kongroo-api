<?php

namespace App\Models\Article\Section\Content\Video;

use App\Models\Article\Section\Content\Content;
use App\Transformers\Eloquent\Content\ApiVideoContentTransformer;

class ContentVideo extends Content
{
    protected $table = 'content_video';

    public $type = "video";

    public $transformers = [
        "api" => ApiVideoContentTransformer::class
    ];

}
