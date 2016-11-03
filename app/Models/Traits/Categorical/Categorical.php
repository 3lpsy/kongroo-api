<?php
namespace App\Models\Traits\Categorical;

use Illuminate\Support\Collection;
use App\Models\Category\Category;
use App\Models\Traits\Categorical\GuardAgainstDuplicateCategories;

trait Categorical {

    use GuardAgainstDuplicateCategories;

    public function categorize(Category $category) {

        if ($this->guardAgainstDuplicateCategories($category)) {
            $this->categories()->save($category);
        }
    }

    public function categorizeMany(Collection $categories) {
        foreach($categories as $category) {
            $this->categorize($category);
        }
    }

}