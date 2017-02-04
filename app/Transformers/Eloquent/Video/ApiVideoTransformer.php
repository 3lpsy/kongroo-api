<?php
namespace App\Transformers\Eloquent\Video;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Transformers\Eloquent\Video\Source\ApiVideoSourceTransformer;
use App\Transformers\Eloquent\Image\ApiImageTransformer;

use App\Models\Video\Video;

class ApiVideoTransformer extends EloquentTransformer
{
    protected $defaultIncludes = ['sources', 'poster'];

    public function transform(Video $video)
    {
        return [
            'id' => (int) $video->id,
            'title' => $video->title,
            'description' => $video->description,
            // 'poster' => $this->includePoster($video),
            // 'sources' => $this->includeSources($video)
        ];
    }

    public function includeSources(Video $video)
    {
        return $this->collection($video->sources, new ApiVideoSourceTransformer, false);
    }

    public function includePoster(Video $video)
    {
        return $this->item($video->poster, new ApiImageTransformer, false);
    }
}
