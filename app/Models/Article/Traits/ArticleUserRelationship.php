<?php

namespace App\Models\Article\Traits;

trait ArticleUserRelationship
{

    public function author() {
        return $this->belongsTo(config('models.user.namespace'), 'author_id');
    }

    public function publisher() {
        return $this->belongsTo(config('models.user.namespace'), 'published_by_id');
    }

    public function authoredBy($user) {
        $this->author_id = $user->id;
        $this->save();
        return $this;
    }

    public function publishedBy($user) {
        $this->published_by_id = $user->id;
        $this->save();
        return $this;
    }

}
