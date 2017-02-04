<?php

namespace App\Models\Article\Traits;

trait ArticleScope
{
    public function scopeTrendingByPivot($query)
    {
        return $query->leftJoin('reads', 'articles.id', '=', 'reads.article_id')
            ->selectRaw('articles.*, count(reads.article_id) as total')
            ->groupBy('articles.id')
            ->with('readers')
            ->orderBy('total', 'desc');
    }

    public function scopePublished($query, $published = true)
    {
        if ($published) {
            return $query->where('published_at', '<=', date('Y-m-d H:i:s'));
        }
        return $query->where('published_at', '>', date('Y-m-d H:i:s'));
    }

    public function scopeTop($query, $limit = 10)
    {
        return $query->orderBy('reads', 'desc')->limit($limit);
    }

    public function scopeTags($query, $ids)
    {
        if (! $ids || empty($ids)) {
            return $query;
        }

        $ids = array_map(function ($id) {
            return (int) $id;
        }, (array) $ids);

        return $query->whereHas("tags", function ($query) use ($ids) {
            return $query->whereIn(config("models.tag.table").".id", $ids);
        });
    }
}
