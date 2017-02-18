<?php
namespace App\Transformers\Eloquent\Category;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Category\Category;

class ApiCategoryTransformer extends EloquentTransformer
{
    public function transform(Category $category)
    {
        return [
            'id' => (int) $category->id,
            'name' => $category->name
        ];
    }
}
