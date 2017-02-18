<?php
namespace App\Transformers\Eloquent\Article;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Transformers\Eloquent\Section\ApiSectionTransformer;
use App\Transformers\Eloquent\User\ApiAuthorTransformer;
use App\Transformers\Eloquent\Tag\ApiTagTransformer;
use App\Transformers\Eloquent\Status\ApiStatusTransformer;

use App\Models\Article\Article;

class ApiArticleTransformer extends EloquentTransformer
{
    protected $defaultIncludes = ['sections', 'author', 'tags', 'statuses'];

    public function transform(Article $article)
    {
        return [
            'id' => (int) $article->id,
            'title' => $article->title,
            'subTitle' => $article->sub_title,
            'reads' => $article->reads,
            'slug' => $article->slug,
            'views' => (int) $article->views,
            'publishedAt' => $article->published_at->timestamp,
            'createdAt' => $article->created_at->timestamp,
            'updatedAt' => $article->updated_at->timestamp,
            'queriedAt' => \Carbon\Carbon::now()->timestamp,
        ];
    }

    public function includeStatuses(Article $article)
    {
        return $this->collection($article->statuses, new ApiStatusTransformer, false);
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
