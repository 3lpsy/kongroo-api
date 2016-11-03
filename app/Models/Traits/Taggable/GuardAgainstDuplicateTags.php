<?php

namespace App\Models\Traits\Taggable;

use App\Exceptions\Models\DuplicateTagsException;

trait GuardAgainstDuplicateTags {
    /**     * Why can't I just use the relation?
     * I had to modify the query?
     * This took me 2 hours.
     * I still don't know why $this->tags doesn't
     * I'm dead inside.
     */
    protected function guardAgainstDuplicateTags($tag) {
        if ($this->tags()->where(config('models.tag.table') . '.id', $tag->id)->count()) {
            return false;
            throw new DuplicateTagsException;
        }
        return true;
    }
}