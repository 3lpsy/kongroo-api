<?php
namespace App\Repositories;

use Exception;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Presenters\{PresentableInterface, PresenterInterface};
use App\Repositories\RepositoryInterface;
/**
 * Class BaseRepository
 * @package Prettus\Repository\Eloquent
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model
     */
    protected $resource;

    /**
     * @var Model
     */
    protected $load;

    /**
     * @var Model
     */
    protected $builder;

    /**
     * @var Model
     */
    protected $built = false;

    /**
     * @var Model
     */
    protected $presenters;

    /**
     * @var Model
     */
    protected $presenter;

    /**
     * @var Model
     */
    protected $skipPresenter;

    /**
     * @var Model
     */
    protected $results;


    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->initResource();
        $this->initPresenters();
        $this->initBuilder();
        $this->boot();
    }

    /**
     *
     */
    public function boot()
    {
        return $this;
    }

    public function load($load)
    {
        $this->load = $load;
        return $this;
    }

    public function build()
    {
        $this->results = $this->builder->get();
        $this->built = true;
        return $this;
    }


    protected function initResource()
    {
        $resource = $this->makeResource();
        $this->setResource($resource);
    }

    protected function initBuilder()
    {
        $this->builder = $this->resource->newQuery();
        return $this;
    }

    /**
     * @return Model
     * @throws RepositoryException
     */
    protected function makeResource()
    {
        $resource = $this->app->make($this->resource());
        return $resource;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @throws RepositoryException
     */
    public function resetResource()
    {
        $this->makeResource();
    }

    /**
     * [initPresenters description]
     * @return [type] [description]
     */
    protected function initPresenters()
    {
        $this->presenters = new Collection;
        $this->presenterIncludes = [];

        $this->presenters();
    }

    /**
     * [addPresenter description]
     * @param [type] $key       [description]
     * @param [type] $presenter [description]
     */
    protected function addPresenter($presenter, $key, $activate = false)
    {
        if ($presenter = $this->makePresenter($presenter)) {
            $this->presenters->put($key, $presenter);
            return $activate || ! $this->presenter ? $this->presenter($key): $this;
        }
    }

    public function presenter($key)
    {
        $this->presenter = $this->getPresenter($key);
        return $this;
    }

    public function include($include)
    {
        $this->presenter->include($include);
        return $this;
    }


    public function getPresenter($key) {
        if (! $this->presenters->has($key)) {
            $this->throwsNoPresenterExists();
        }
        return $this->presenters->get($key);
    }

    /**
     * @param null $presenter
     *
     * @return PresenterInterface
     * @throws RepositoryException
     */
    protected function makePresenter($presenter)
    {
        if (!is_null($presenter)) {
            $presenter = is_string($presenter) ? $this->app->make($presenter) : $presenter;
            if (! $presenter instanceof PresenterInterface) {
                return $this->throwsNeedsPresenterClass($presenter);
            }
            return $presenter;
        }
        return $this->throwsNeedsPresenterClass($presenter);
    }



    /**
     * Wrapper result data
     *
     * @param mixed $result
     *
     * @return mixed
     */
    public function parse()
    {
        if (! $this->built) {
            $this->build();
        }
        $results = $this->results;
        if (!$this->skipPresenter && $this->presenter instanceof PresenterInterface) {
            if ($results instanceof Collection || $results instanceof LengthAwarePaginator) {
                $results->each(function ($model) {
                    if ($model instanceof PresentableInterface) {
                        $model->presenter($this->presenter);
                    }
                    return $model;
                });
            } elseif ($results instanceof Presentable) {
                $results = $results->presenter($this->presenter);
            }
            if (!$this->skipPresenter) {
                return $this->presenter->present($results);
            }
        }
        return $results;
    }

    public function throwsNeedsPresenterClass($presenter) {
        $presenter = get_class($presenter);
        throw new Exception("Class {$presenter} must be an instance of \App\\Presenters\PresenterInterace");
    }
    public function throwsNoPresenterExists($key) {
        throw new Exception("Presenter: {$key} does not exists.");
    }


}
