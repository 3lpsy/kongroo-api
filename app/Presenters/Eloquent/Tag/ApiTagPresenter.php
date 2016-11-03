<?php

namespace App\Presenters\Eloquent\Tag;

use App\Presenters\Eloquent\EloquentPresenter;
use App\Transformers\Eloquent\Tag\ApiTagTransformer;

class ApiTagPresenter extends EloquentPresenter
{

        /**
     * @var string
     */
    protected $resourceKeyItem = "tag";
    /**
     * @var string
     */
    protected $resourceKeyCollection = "tags";
    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ApiTagTransformer;
    }
}