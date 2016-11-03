<?php

namespace App\Models\Article\Traits;

trait ArticleRelationship
{
    public function sections() {
        return $this->hasMany(config('models.section.namespace'))->orderBy('sort', 'ASC');
    }

    public function tags() {
		return $this->morphToMany(config('models.tag.namespace'), 'taggable');
	}

    public function comments() {
        return $this->hasMany(config('models.comment.namespace'));
    }

	public function series() {
		return $this->belongsToMany(config('models.series.namespace'), 'article_article_group', 'article_id', 'series_id');
	}

    public function categories() {
        return $this->belongsToMany(config('models.category.namespace'), 'article_category', 'article_id', 'category_id');
    }

    public function readers() {
        return $this->belongsToMany(config('models.user.namespace'), 'reads', 'article_id', 'user_id');
    }
}
