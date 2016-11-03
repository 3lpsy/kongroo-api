<?php
namespace App\Models\Traits\Taggable;

use Illuminate\Support\Collection;
use App\Models\Tag\Tag;
use App\Models\Traits\Taggable\GuardAgainstDuplicateTags;

trait Taggable {

    use GuardAgainstDuplicateTags;

    public function tag(Tag $tag) {
        if ($tag instanceof Collection || is_array($tag)){
            return $this->tagMany($tag);
        }
        if ($this->guardAgainstDuplicateTags($tag)) {
            $this->tags()->save($tag);
        }
    }

    public function tagMany(Collection $tags) {
        foreach($tags as $tag) {
            $this->tag($tag);
        }
    }

    public function untag(Tag $tag) {
        $this->tags()->detach();
    }

    public function untagMany(Collection $tags) {
        foreach ($tags as $tag) {
            $this->untag($tag);
        }
    }

}