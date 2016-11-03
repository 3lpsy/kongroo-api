<?php
namespace App\Transformers\Eloquent\Status;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Status\Status;

class ApiStatusTransformer extends EloquentTransformer
{

    public function transform(Status $status)
    {
        return [
            'name' => $status->name
        ];
    }
}
