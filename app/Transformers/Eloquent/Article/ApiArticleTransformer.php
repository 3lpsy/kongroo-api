<?php
namespace App\Transformers\Eloquent\Article;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Transformers\Eloquent\Section\ApiSectionTransformer;
use App\Transformers\Eloquent\User\ApiAuthorTransformer;
use App\Transformers\Eloquent\Tag\ApiTagTransformer;

use App\Models\Article\Article;

class ApiArticleTransformer extends EloquentTransformer
{
    protected $defaultIncludes = ['sections', 'author', 'tags'];

    public function transform(Article $article)
    {
        return [
            'id' => (int) $article->id,
            'title' => $article->title,
            'subTitle' => $article->sub_title,
            'reads' => $article->reads,
            'slug' => $article->slug,
            'publishedAt' => [
                'date' => $article->published_at->format('Y-m-d'),
                'diffForHumans' => $article->published_at->diffForHumans()
            ]
        ];
    }

    public function includeSections(Article $article)
    {
        return $this->collection($article->sections, new ApiSectionTransformer, false);
    }

    public function includeAuthor(Article $article)
    {
        return $this->item($article->author, new ApiAuthorTransformer, false);
    }

    public function includeTags(Article $article)
    {
        return $this->collection($article->tags, new ApiTagTransformer, false);
    }
}
