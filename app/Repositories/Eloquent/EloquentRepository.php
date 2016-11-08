<?php

namespace App\Repositories\Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Repository;
use App\Repositories\Eloquent\EloquentRepositoryInterface;
use App\Models\Model\Model;

abstract class EloquentRepository extends Repository implements EloquentRepositoryInterface
{

    protected function makeResource()
    {
        $resource = $this->app->make($this->resource());
        if (!$resource instanceof Model) {
            throw new Exception("Class {$this->resource()} must be an instance of App\\Models\\Model\\Model");
        }
        return $this->resource = $resource;
    }
    public function all()
    {
        $this->builder = $this->builder->all();
        return $this;
    }

    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 15) : $limit;
        $this->results = $this->builder->{$method}($limit, $columns);
        $this->built = true;
        return $this;
    }

    public function simplePaginate($limit = null, $columns = ['*'])
    {
        return $this->paginate($limit, $columns, "simplePaginate");
    }

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*'])
    {
        $results = $this->builder->findOrFail($id, $columns);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }

    /**
     * Check if entity has relation
     *
     * @param string $relation
     *
     * @return $this
     */
    public function whereHasIn($name, $array, $nullable = false)
    {
        $method = "has" . ucfirst($name);
        $this->builder = $this->builder->{$method}($array, $nullable);
        return $this;
    }

    /**
     * Set hidden fields
     *
     * @param array $fields
     *
     * @return $this
     */
    public function hidden(array $fields)
    {
        $this->resource->setHidden($fields);
        return $this;
    }
    /**
     *
     * @param  [type] $column    [description]
     * @param  string $direction [description]
     */
    public function orderBy($column, $direction = 'asc')
    {
        $this->resource = $this->resource->orderBy($column, $direction);
        return $this;
    }

}
