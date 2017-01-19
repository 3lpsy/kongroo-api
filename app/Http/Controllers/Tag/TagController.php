<?php
namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request as IlluminateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Tag\Tag;
use App\Repositories\Eloquent\Tag\TagRepositoryInterface;

class TagController extends Controller
{
    protected $repo;

    public function __construct(TagRepositoryInterface $repo)
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
        $data = $this->repo->presenter('api')
                ->paginate()
                ->parse();
        return $this->send($data);
    }

    public function show($tag)
    {
        $data = $this->repo->presenter('api')
                ->find($tag)
                ->parse();

        return $this->send($data);
    }
}
