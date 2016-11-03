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

	public function scopeHasTags($query, $ids, $nullable = false)
	{
		if (empty($ids) && $nullable) {
			return $query;
		}
		return $query->whereHas("tags", function($query) use ($ids){
			return $query->whereIn("id", $ids);
		});
	}


}
