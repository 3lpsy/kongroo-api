<?php

namespace App\Models\Tag\Traits;

trait TagRelationship
{

    public function articles()
    {
        return $this->morphedByMany(config('models.article.namespace'), 'taggable');
    }

    public function users()
    {
        return $this->morphedByMany(config('models.user.namespace'), 'taggable');
    }

    public function series()
    {
        return $this->morphedByMany(config('models.series.namespace'), 'taggable');
    }

}
