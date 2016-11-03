<?php
namespace App\Transformers\Eloquent\SectionType;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Article\Section\Type\SectionType;

class ApiSectionTypeTransformer extends EloquentTransformer
{

    public function transform(SectionType $type)
    {
        return [
            'name' => $type->name
        ];
    }
}
