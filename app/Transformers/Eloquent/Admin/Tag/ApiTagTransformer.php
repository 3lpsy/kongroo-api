<?php
namespace App\Transformers\Eloquent\Admin\Tag;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
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
