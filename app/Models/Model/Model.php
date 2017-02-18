<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use App\Models\Model\Traits\ModelRelationship;
use App\Models\Model\Traits\ModelRelationshipHelpers;
use App\Models\Model\Traits\ModelObservable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends IlluminateModel
{
    use ModelRelationship,
        ModelRelationshipHelpers,
        ModelObservable,
        SoftDeletes;

    public $status = false;

    public $track = [
        'created',
        'updated',
        'deleted',
        'restored'
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'restored_at'
    ];

    public function __construct(array $attributes = [])
    {
        if (property_exists($this, 'model')) {
            $this->bootConfig();
        }
        parent::__construct($attributes);
    }

    public function bootConfig()
    {
        $config = $this->config();
        if ($config) {
            $table = $this->config('table');
            if (env('DB_DRIVER') !== "sqlite") {
                $table = $this->getConnection()->getDatabaseName() . "." . $table;
            }
            return $this->table = $table;
        }
        throw new \Exception("No Config Found For Model: " . get_class($this));
    }

    public function getMorphType()
    {
        return $this->config('morph', $this->model);
    }

    public function config($key = null, $default = '')
    {
        return config('models.' . $this->model . ($key ? '.' . $key : ''), $default);
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function fromPivot($attribute)
    {
        if (! $this->pivot) {
            throw new \Exception("No Pivot Table");
        }

        return $this->pivot->{$attribute};
    }
}
