<?php
namespace App\Transformers\Eloquent\Admin\Image;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Models\Image\Image;

class ApiImageTransformer extends EloquentTransformer
{
    public function transform(Image $image)
    {
        return [
            'id' => (int) $image->id,
            'src' => $image->resolveUrl(),
            'protocol' => $image->protocol,
            'resolution' => $image->resolution,
            'mime' => $image->mime,
            'type' => $image->type
        ];
    }
}
