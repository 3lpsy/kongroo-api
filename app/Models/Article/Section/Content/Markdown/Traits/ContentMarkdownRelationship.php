<?php

namespace App\Models\Article\Section\Content\Markdown\Traits;

trait ContentMarkdownRelationship
{

    public function markdown() {
        return $this->belongsTo(config("models.markdown.class"), "markdown_id");
    }
}
