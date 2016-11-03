<?php
namespace App\Transformers\Eloquent\Content;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Article\Section\Content\Content;

class ApiContentTransformer extends EloquentTransformer
{

    public function transform(Content $content)
    {
        return $content->transformer("api")->transform($content);
    }
}
