<?php

namespace App\Models\Article;

use App\Models\Model\Model;
use App\Models\Article\Traits\ArticleRelationship;
use App\Models\Article\Traits\ArticleUserRelationship;

use App\Models\Article\Traits\ArticleScope;
use App\Models\Traits\Taggable\Taggable;
use App\Models\Traits\Categorical\Categorical;
use App\Models\Status\Status;

class Article extends Model
{
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


    public function statuses()
    {
        return $this->morphToMany(
            config('models.status.namespace'),
            'statusable',
            'statusable'
        );
    }

    public function addStatus($name)
    {
        $status = Status::where('name', $name)->firstOrFail();

        $this->statuses()->save($status);
        // dd($this->statuses);
    }
}
