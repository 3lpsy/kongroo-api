<?php
namespace App\Transformers\Eloquent\Content;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Transformers\Eloquent\Markdown\ApiMarkdownTransformer;
use App\Models\Article\Section\Content\Markdown\ContentMarkdown;

class ApiMarkdownContentTransformer extends EloquentTransformer
{

    public function transform(ContentMarkdown $content)
    {
        if ($content->provider === "local") {
            return $this->transformLocal($content);
        }
        return $this->transformRemote($content);
    }

    public function transformLocal(ContentMarkdown $content)
    {
        return [
            'id' => (int) $content->id,
            'provider' => $content->provider,
            'type' => $content->type,
            'markdown' => (new ApiMarkdownTransformer)->transform($content->markdown)
        ];
    }

    public function transformRemote(ContentMarkdown $content)
    {
        return [
            'id' => (int) $content->id,
            'provider' => $content->provider,
            'type' => $content->type,
            'makrdown' => "wut"
        ];
    }
}
