<?php
namespace App\Transformers\Eloquent\Article;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Article\Article;

class HttpArticleTransformer extends EloquentTransformer
{
    public function transform(Article $article)
    {
        return [
        ];
    }
}
