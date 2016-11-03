<?php

namespace App\Presenters\Eloquent;

use App\Presenters\Presenter;
use App\Transfomers\Eloquent\EloquentTransformer;
use App\Services\Fractal\Serializers\Eloquent\EloquentSerializer;

class EloquentPresenter extends Presenter {


    /**
     * Transformer
     *
     * @return ModelTransformer
     * @throws Exception
     */
    public function getTransformer()
    {
        return new EloquentTransformer();
    }

     /**
     * Get Serializer
     *
     * @return SerializerAbstract
     */
    public function serializer()
    {
        return new EloquentSerializer;
    }
}