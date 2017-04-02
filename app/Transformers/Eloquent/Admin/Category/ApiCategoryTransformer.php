<?php
namespace App\Transformers\Eloquent\Admin\Category;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
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
