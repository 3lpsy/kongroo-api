<?php
namespace App\Repositories\Eloquent\Article;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\Article\ArticleRepositoryInterface;
use App\Presenters\Eloquent\Article\ApiArticlePresenter;
use App\Presenters\Eloquent\Article\HttpArticlePresenter;

use App\Models\Article\Article;

class ArticleRepository extends EloquentRepository implements ArticleRepositoryInterface
{

    public function resource()
    {
        return Article::class;
    }

    public function presenters() {
        $this->addPresenter(ApiArticlePresenter::class, 'api', true);
        $this->addPresenter(HttpArticlePresenter::class, 'http', true);
        return true;
    }

}