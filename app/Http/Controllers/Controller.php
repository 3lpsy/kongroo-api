<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Laravel\Lumen\Http\ResponseFactory;
class Controller extends BaseController
{

    protected $data;

    protected $statusCode = 200;

    public function __construct() {
        $this->initResponse();
    }

    public function send($data = null, $headers = [], $code = 200)
    {
        $this->initDataIfNotSet();
        return ResponseFactory::json($data ?: $this->data->toArray(), $code, $headers);
    }

    protected function pass($compact) {
        $this->initDataIfNotSet();
        foreach($compact as $key => $value) {
            $this->passByKey($key, $value);
        }
        return $this;
    }

    protected function passByKey($key, $value) {
        $this->data->put($key, $value);
        return $this;
    }


    protected function initDataIfNotSet()
    {
        if (! $this->data instanceof Collection) {
            $this->data = new Collection;
        }
    }

    public function __get($key)
    {
        $this->initDataIfNotSet();
        if($this->data->has($key)) {
            return $this->data->get($key);
        }
    }

}
