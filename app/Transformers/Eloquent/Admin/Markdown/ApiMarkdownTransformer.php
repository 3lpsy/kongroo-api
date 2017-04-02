<?php
namespace App\Transformers\Eloquent\Admin\Markdown;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
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
