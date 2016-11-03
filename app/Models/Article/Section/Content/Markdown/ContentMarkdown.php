<?php

namespace App\Models\Article\Section\Content\Markdown;

use App\Models\Article\Section\Content\Content;
use App\Transformers\Eloquent\Content\ApiMarkdownContentTransformer;
use App\Models\Article\Section\Content\Markdown\Traits\ContentMarkdownRelationship;
class ContentMarkdown extends Content
{
    use ContentMarkdownRelationship;

    protected $table = 'content_markdown';

    public $type = "markdown";

    public $transformers = [
        "api" => ApiMarkdownContentTransformer::class
    ];

}
