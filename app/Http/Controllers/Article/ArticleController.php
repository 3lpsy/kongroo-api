<?php
namespace App\Http\Controllers\Article;

use Illuminate\Http\Request as IlluminateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Article\Article;
use App\Repositories\Eloquent\Article\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    protected $repo;

    public function __construct(ArticleRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IlluminateRequest $request, $page = 1)
    {
        $limit = $request->input('limit') ?: 15;
        $tags = $request->input('tags') ?: [];
        $allTags = $request->input('allTags') ?: true;
        $data = $this->repo->presenter('api')
                ->includeWith([
                    'sections',
                    'sections.content',
                    'sections.type',
                    'sections.status',
                    'author',
                    'tags'
                ])
                ->whereHasIn("tags", $tags, $allTags)
                ->paginate($limit)
                ->parse();
        return $this->send($data);
    }

    public function show($article)
    {
        $data = $this->repo->presenter('api')
                ->includeWith([
                    'sections',
                    'sections.content',
                    'sections.type',
                    'sections.status',
                    'author',
                    'tags'
                ])
                ->find($article)
                ->parse();

        return $this->send($data);
    }

}
