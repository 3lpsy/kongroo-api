<?php

namespace App\Presenters\Eloquent\Article;

use App\Presenters\Eloquent\EloquentPresenter;
use App\Transformers\Eloquent\Article\HttpArticleTransformer;

class HttpArticlePresenter extends EloquentPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HttpArticleTransformer;
    }
}