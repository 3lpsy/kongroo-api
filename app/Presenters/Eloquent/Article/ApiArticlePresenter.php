<?php

namespace App\Presenters\Eloquent\Article;

use App\Presenters\Eloquent\EloquentPresenter;
use App\Transformers\Eloquent\Article\ApiArticleTransformer;

class ApiArticlePresenter extends EloquentPresenter
{

        /**
     * @var string
     */
    protected $resourceKeyItem = "article";
    /**
     * @var string
     */
    protected $resourceKeyCollection = "articles";
    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ApiArticleTransformer;
    }
}