<?php

namespace App\Models\Article\Section\Traits;

trait SectionRelationship
{
    public function articles() {
        return $this->belongsTo(config('models.article.namespace'));
    }

    public function type() {
        return $this->belongsTo(config('models.sectionType.namespace'), 'type_id');
    }

    public function content()
    {
        return $this->morphTo("content", 'contentable_type', 'contentable_id');
    }
}
