<?php
namespace App\Transformers\Eloquent\Admin\SectionType;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Models\Article\Section\Type\ArticleSectionType;

class ApiSectionTypeTransformer extends EloquentTransformer
{

    public function transform(ArticleSectionType $type)
    {
        return [
            'name' => $type->name
        ];
    }
}
