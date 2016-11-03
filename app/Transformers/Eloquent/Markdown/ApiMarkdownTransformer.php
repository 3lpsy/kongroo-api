<?php
namespace App\Transformers\Eloquent\Markdown;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Markdown\Markdown;

class ApiMarkdownTransformer extends EloquentTransformer
{

    public function transform(Markdown $markdown)
    {
        return [
            'id' => (int) $markdown->id,
            'body' => $markdown->body
        ];
    }
}
