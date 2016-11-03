<?php
namespace App\Transformers\Eloquent\Tag;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Tag\Tag;

class ApiTagTransformer extends EloquentTransformer
{

    public function transform(Tag $tag)
    {
        return [
            'id' => (int) $tag->id,
            'name' => $tag->name
        ];
    }
}
