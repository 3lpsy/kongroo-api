<?php

namespace App\Models\Article;

use App\Models\Model\Model;
use App\Models\Article\Traits\ArticleRelationship;
use App\Models\Article\Traits\ArticleUserRelationship;

use App\Models\Article\Traits\ArticleScope;
use App\Models\Traits\Taggable\Taggable;
use App\Models\Traits\Categorical\Categorical;

class Article extends Model {

    use ArticleRelationship,
        ArticleUserRelationship,
        ArticleScope,
        Taggable,
        Categorical;

    /**
     * Table Name
     * @var string
     */
    protected $model = 'article';

    public $dates = ['published_at'];

}
