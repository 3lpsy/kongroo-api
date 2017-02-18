<?php

namespace App\Models\Category\Traits;

trait CategoryRelationship
{
    public function articles()
    {
        return $this->belongsToMany(config('models.article.namespace'), 'article_category', 'category_id', 'series_id');
    }

    public function series()
    {
        return $this->hasMany(config('models.series.namespace'), 'series_category', 'category_id', 'series_id');
    }
}
