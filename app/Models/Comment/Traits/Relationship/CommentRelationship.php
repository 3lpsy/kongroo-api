<?php

namespace App\Models\Comment\Traits\Relationship;

trait CommentRelationship
{
	public function articles()
	{
		return $this->belongsTo(config('models.article.namespace'), 'article_id');
	}

}
