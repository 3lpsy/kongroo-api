<?php

namespace App\Http\Controllers\Admin\Series;

use Illuminate\Http\Request as IlluminateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\Series\Series;
use App\Transformers\Eloquent\Series\ApiSeriesTransformer as Transformer;
use Elpsy\Fracto\Fracto;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IlluminateRequest $request, Fracto $fracto, $page = 1)
    {
        // tags needs to be validated
        $tags = Series::orderBy(
            $request->query('sortBy', 'id'),
            $request->query('sortDir', 'ASC')
        )->limit($request->query('limit', -1))
        ->get();

        $data = $fracto->transformer(Transformer::class)
            ->key('series')
            ->data($tags)
            ->toArray();

        return $this->send($data);
    }

    public function show(Fracto $fracto, $tagId)
    {
        $tag = Series::findOrFail($tagId);

        $data = $fracto->transformer(Transformer::class)
            ->data($tag)
            ->includes()->toArray();

        return $this->send($data);
    }
}
