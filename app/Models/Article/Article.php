<?php

namespace App\Models\Article;

use App\Models\Model\Model;
use App\Models\Article\Traits\ArticleRelationship;
use App\Models\Article\Traits\ArticleUserRelationship;

use App\Models\Article\Traits\ArticleScope;
use App\Models\Traits\Taggable\Taggable;
use App\Models\Traits\Categorical\Categorical;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {

	use ArticleRelationship,
        ArticleUserRelationship,
        ArticleScope,
        Taggable,
        Categorical,
        SoftDeletes;

	/**
	 * Table Name
	 * @var string
	 */
    protected $table = 'articles';

    public $dates = ['published_at'];

}
