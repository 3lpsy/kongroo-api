<?php

namespace App\Http\Controllers\Admin\DT\Article;

use Illuminate\Http\Request as IlluminateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Article\Article;
use App\Transformers\Eloquent\Article\ApiArticleTransformer as Transformer;

use Elpsy\Fracto\Fracto;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IlluminateRequest $request, Fracto $fracto, $page = 1)
    {
        $orderBy = (string) $request->query('orderBy', 'id');
        $orderBy = in_array($orderBy, ['id', 'title', 'sub_title', 'views', 'author_id', 'slug']) ? $orderBy: 'id';

        $orderDir = (string) $request->query('orderDir', 'ASC');
        $orderDir = in_array(strtoupper($orderDir), ['ASC', 'DESC']) ? $orderDir : 'ASC';

        $limit = (int) $request->query('limit');
        $limit = is_numeric($limit) && $limit < 100 ? $limit : 20;

        \Log::info($orderBy);
        \Log::info($orderDir);
        \Log::info($limit);

        $articles = Article::with(['statuses'])
            ->orderBy($orderBy, $orderDir)->paginate($limit)
            ->appends('orderBy', $orderBy)
            ->appends('limit', $limit)
            ->appends('orderDir', $orderDir);
        $data = $fracto->transformer(Transformer::class, 'article')
            ->data($articles)
            ->includes()->toArray();

        return $this->send($data);
    }

    public function show(Fracto $fracto, $articleId)
    {
        $article = Article::findOrFail($articleId);

        $data = $fracto->transformer(Transformer::class, 'article')
            ->data($article)
            ->includes([
                'statuses'
            ])->toArray();

        return $this->send($data);
    }
}
