<?php
namespace App\Transformers\Eloquent\Admin\Video\Source;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
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
