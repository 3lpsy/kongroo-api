<?php

namespace App\Presenters\Eloquent\Tag;

use App\Presenters\Eloquent\EloquentPresenter;
use App\Transformers\Eloquent\Tag\HttpTagTransformer;

class HttpTagPresenter extends EloquentPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HttpTagTransformer;
    }
}