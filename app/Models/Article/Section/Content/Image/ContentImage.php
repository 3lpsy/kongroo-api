<?php

namespace App\Models\Article\Section\Content\Image;

use App\Models\Article\Section\Content\Content;
use App\Transformers\Eloquent\Content\ApiImageContentTransformer;

class ContentImage extends Content
{
    protected $table = 'content_image';

    public $type = "image";

    public $transformers = [
        "api" => ApiImageContentTransformer::class
    ];

}
