<?php

namespace App\Models\Article\Section\Content;

use App\Models\Model\Model;

abstract class Content extends Model
{
    public function section()
    {
        return $this->morphMany(config('models.section.class'), 'content', 'contentable_type', 'contentable_id');
    }

    public function transformer($name)
    {
        $transformer = $this->transformers["api"];
        return new $transformer;
    }
}
