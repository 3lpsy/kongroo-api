<?php
namespace App\Transformers\Eloquent\Video\Source;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Video\Source\VideoSource;

class ApiVideoSourceTransformer extends EloquentTransformer
{
    public function transform(VideoSource $source)
    {
        return [
            'id' => (int) $source->id,
            'src' => $source->resolveUrlFromPivot(),
            'protocol' => $source->protocol,
            'resolution' => $source->resolution,
            'mime' => $source->mime,
            'type' => $source->type
        ];
    }
}
