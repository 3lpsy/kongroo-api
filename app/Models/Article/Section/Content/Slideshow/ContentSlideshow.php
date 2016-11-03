<?php

namespace App\Models\Article\Section\Content\Slideshow;

use App\Models\Article\Section\Content\Content;
use App\Transformers\Eloquent\Content\ApiSlideshowContentTransformer;

class ContentSlideshow extends Content
{
    protected $table = 'content_slideshow';

    public $type = "slideshow";

    public $transformers = [
        "api" => ApiSlideshowContentTransformer::class
    ];

}
