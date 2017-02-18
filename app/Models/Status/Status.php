<?php

namespace App\Models\Status;

use App\Models\Model\Model;

class Status extends Model
{
    /**
     * Table Name
     * @var string
     */
    protected $model = 'status';

    public function articles()
    {
        return $this->morphToMany(config('models.artcle.namespace'), 'statusable');
    }
}
