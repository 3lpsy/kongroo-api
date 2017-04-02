<?php
namespace App\Transformers\Eloquent\Admin\Article;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Models\Article\Article;

class HttpArticleTransformer extends EloquentTransformer
{
    public function transform(Article $article)
    {
        return [
        ];
    }
}
