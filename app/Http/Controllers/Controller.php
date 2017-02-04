<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Laravel\Lumen\Http\ResponseFactory;

class Controller extends BaseController
{
    protected $statusCode = 200;

    protected $factory;

    public function send($data = null, $headers = [], $code = 200)
    {
        return $this->response()->json($data, $code, $headers);
    }

    public function response()
    {
        if (! $this->factory) {
            $this->factory = new ResponseFactory;
            return $this->factory;
        }
        return $this->factory;
    }
}
