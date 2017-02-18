<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request as IlluminateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Category\Category;
use App\Transformers\Eloquent\Category\ApiCategoryTransformer as Transformer;

use Elpsy\Fracto\Fracto;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IlluminateRequest $request, Fracto $fracto, $page = 1)
    {
        // tags needs to be validated
        $tags = Category::orderBy(
            $request->query('sortBy', 'id'),
            $request->query('sortDir', 'ASC')
        )->limit($request->query('limit', -1))
        ->get();

        $data = $fracto->transformer(Transformer::class)
            ->key('category')
            ->data($tags)
            ->toArray();

        return $this->send($data);
    }

    public function show(Fracto $fracto, $tagId)
    {
        $tag = Category::findOrFail($tagId);

        $data = $fracto->transformer(Transformer::class)
            ->data($tag)
            ->includes()->toArray();

        return $this->send($data);
    }
}
