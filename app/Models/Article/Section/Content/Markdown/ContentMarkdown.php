<?php

namespace App\Models\Article\Section\Content\Markdown;

use App\Models\Article\Section\Content\Content;
use App\Models\Article\Section\Content\Markdown\Traits\ContentMarkdownRelationship;

class ContentMarkdown extends Content
{
    use ContentMarkdownRelationship;

    protected $model = 'content_markdown';

    public $type = "markdown";


}
