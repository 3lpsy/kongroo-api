<?php
namespace App\Transformers\Eloquent\Admin\Content;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Transformers\Eloquent\Admin\Video\ApiVideoTransformer;
use App\Models\Article\Section\Content\Video\ContentVideo;

class ApiVideoContentTransformer extends EloquentTransformer
{
    protected $defaultIncludes = [
        'video'
    ];

    public function transform(ContentVideo $content)
    {
        return [
            'id' => (int) $content->id,
            'provider' => $content->provider,
            'type' => $content->type,
        ];
    }

    public function includeVideo(ContentVideo $content)
    {
        return $this->item($content->video, new ApiVideoTransformer, false);
    }
}
