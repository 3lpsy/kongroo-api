<?php

namespace App\Models\Access\User\Traits;

trait UserRelationship
{

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
