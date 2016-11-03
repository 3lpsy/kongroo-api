<?php
namespace App\Repositories\Eloquent\Tag;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\Tag\TagRepositoryInterface;
use App\Presenters\Eloquent\Tag\ApiTagPresenter;
use App\Presenters\Eloquent\Tag\HttpTagPresenter;

use App\Models\Tag\Tag;

class TagRepository extends EloquentRepository implements TagRepositoryInterface
{

    public function resource()
    {
        return Tag::class;
    }

    public function presenters() {
        $this->addPresenter(ApiTagPresenter::class, 'api', true);
        $this->addPresenter(HttpTagPresenter::class, 'http', true);
        return true;
    }

}