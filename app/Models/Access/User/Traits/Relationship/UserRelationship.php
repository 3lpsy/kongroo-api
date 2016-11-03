<?php

namespace App\Models\Access\User\Traits\Relationship;

trait UserRelationship
{

	public function phone() {
		return $this->hasMany(config("models.phone.namespace"));
	}

	public function settings() {
		return $this->belongsTo(config("models.userSettings.namespace"), 'settings_id');
	}

	public function comments()
	{
		return $this->hasMany(config('models.comment.namespace'), 'author_id');
	}

	public function articles()
	{
		return $this->hasMany(config('models.article.namespace'), 'author_id');
	}

	public function tags()
	{
		return $this->morphToMany(config('models.tag.namespace'), 'taggable');
	}

	public function reads() {
		return $this->belongsToMany(config('models.article.namespace'), 'reads', 'user_id', 'article_id');
	}

}
