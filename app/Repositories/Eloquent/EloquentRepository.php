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

        /**
     * Retrieve data array for populate field select
     *
     * @param string      $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection|array
     */
    public function lists($column, $key = null)
    {
        return $this->resource->lists($column, $key);
    }
    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        if ($this->resource instanceof Builder) {
            $results = $this->resource->get($columns);
        } else {
            $results = $this->resource->all($columns);
        }
        $this->resetResource();
        $this->results = $results;
        return $this;
    }
    /**
     * Retrieve first data of repository
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function first($columns = ['*'])
    {
        $results = $this->resource->first($columns);
        $this->resetResource();
        $this->results = $results;
        return $this;
    }
    /**
     * Retrieve all data of repository, paginated
     *
     * @param null   $limit
     * @param array  $columns
     * @param string $method
     *
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 15) : $limit;
        $results = $this->resource->{$method}($limit, $columns);
        $results->appends(app('request')->query());
        $this->resetResource();
        $this->results = $results;
        return $this;
    }
    /**
     * Retrieve all data of repository, simple paginated
     *
     * @param null  $limit
     * @param array $columns
     *
     * @return mixed
     */
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
        $results = $this->resource->findOrFail($id, $columns);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }
    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByField($field, $value = null, $columns = ['*'])
    {
        $results = $this->resource->where($field, '=', $value)->get($columns);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }
    /**
     * Find data by multiple fields
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        $results = $this->resource->get($columns);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }
    /**
     * Find data by multiple values in one field
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        $results = $this->resource->whereIn($field, $values)->get($columns);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }
    /**
     * Find data by excluding multiple values in one field
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        $results = $this->resource->whereNotIn($field, $values)->get($columns);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }
    /**
     * Save a new entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $results = $this->resource->newInstance($attributes);
        $results->save();
        $this->resetResource();
        return $result;
    }
    /**
     * Update a entity in repository by id
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $results = $this->resource->findOrFail($id);
        $results->fill($attributes);
        $results->save();
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }
    /**
     * Update or Create an entity in repository
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $results = $this->resource->updateOrCreate($attributes, $values);
        $this->resetResource();
        $this->results = $results;
        return $this;;
    }

    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $results = $this->find($id);
        $this->resetResource();
        $deleted = $results->delete();
        return $deleted;
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
        $this->resource = $this->resource->{$method}($array, $nullable);
        return $this;
    }
    /**
     * Load relations
     *
     * @param array|string $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->resource = $this->resource->with($relations);
        return $this;
    }

    public function includeWith($includeWith)
    {
        $this->presenter->include($includeWith);
        $this->with($includeWith);
        return $this;
    }

    /**
     * Load relations
     *
     * @param array|string $relations
     *
     * @return $this
     */
    public function where($column, $operation, $value = null)
    {
        if (!$value) {
            $value = $operation;
            $this->whereEqual($column, $value);
        }
        else {
            $this->resource = $this->resource->where($column, $operation, $value);
        }
        return $this;
    }

    public function whereEqual($column, $value)
    {
        $this->resource = $this->resource->where($column, $value);
        return $this;
    }

    /**
     * Load relation with closure
     *
     * @param string $relation
     * @param closure $closure
     *
     * @return $this
     */
    function whereHas($relation, $closure)
    {
        $this->resource = $this->resource->whereHas($relation, $closure);
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

    /**
     * Set visible fields
     *
     * @param array $fields
     *
     * @return $this
     */
    public function visible(array $fields)
    {
        $this->resource->setVisible($fields);
        return $this;
    }

}