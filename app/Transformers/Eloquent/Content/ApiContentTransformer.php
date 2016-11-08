<?php
namespace App\Transformers\Eloquent\Content;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Transformers\Eloquent\Content\ApiMarkdownContentTransformer;
use App\Models\Article\Section\Content\Content;

class ApiContentTransformer extends EloquentTransformer
{

    protected $type;

    protected $transformers = [
        'content_markdown' => \App\Transformers\Eloquent\Content\ApiMarkdownContentTransformer::class
    ];


    protected $transformer;

    public function __construct($type)
    {
        if ($type) {
            $this->type = $type;
            $transformer = $this->transformers[$type];
            $this->transformer = new $transformer;
        }
    }

    public function transform(Content $content)
    {
        if ($transformer = $this->transformer) {
            return $this->transformer->transform($content);
        }
        return null;
    }
}
