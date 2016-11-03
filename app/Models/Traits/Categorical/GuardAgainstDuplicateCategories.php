<?php

namespace App\Models\Traits\Categorical;

use App\Exceptions\Models\DuplicateCategoriesException;

trait GuardAgainstDuplicateCategories {
    /**     * Why can't I just use the relation?
     * I had to modify the query?
     * This took me 2 hours.
     * I still don't know why $this->tags doesn't
     * I'm dead inside.
     */
    protected function guardAgainstDuplicateCategories($category) {
        if ($this->categories()->where(config('models.category.table') . '.id', $category->id)->count()) {
            throw new DuplicateCategoriesException;
        }
        return true;
    }
}