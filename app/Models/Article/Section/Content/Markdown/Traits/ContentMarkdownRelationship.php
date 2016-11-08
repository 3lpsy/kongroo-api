<?php

namespace App\Models\Article\Section\Content\Markdown\Traits;

trait ContentMarkdownRelationship
{

    public function markdown() {
        return $this->belongsTo(config("models.markdown.namespace"), "markdown_id");
    }
}
