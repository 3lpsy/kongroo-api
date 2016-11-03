<?php

namespace App\Models\Series\Traits;

trait SeriesRelationship
{
    public function articles() {
		return $this->belongsToMany(config('models.article.namespace'), 'article_article_group', 'series_id', 'article_id');
	}

	public function tags() {
		return $this->morphToMany(config('models.tag.namespace'), 'taggable');
	}

}
