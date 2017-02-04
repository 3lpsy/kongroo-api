<?php

namespace App\Http\Controllers\Article;

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
        // tags needs to be validated
        $articles = Article::with([
            'sections',
            'sections.content',
            'sections.type',
            'author',
            'tags'
        ])->scopes([
            'tags' => $request->query('tags', false)
        ])->paginate();

        $data = $fracto->transformer(Transformer::class, 'article')
            ->data($articles)
            ->includes([
                'sections',
                'sections.content',
                'sections.content.video',
                'sections.content.video.sources',
                'sections.type',
                'author',
                'tags'
            ])->toArray();

        return $this->send($data);
    }

    public function show(Fracto $fracto, $articleId)
    {
        $article = Article::findOrFail($articleId);

        $data = $fracto->transformer(Transformer::class, 'article')
            ->data($article)
            ->includes([
                'sections',
                'sections.content',
                'sections.content.video',
                'sections.content.video.sources',
                'sections.type',
                'author',
                'tags'
            ])->toArray();

        return $this->send($data);
    }
}
