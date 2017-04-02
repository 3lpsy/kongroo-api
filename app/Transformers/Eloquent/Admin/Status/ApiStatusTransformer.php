<?php
namespace App\Transformers\Eloquent\Admin\Status;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Models\Status\Status;

class ApiStatusTransformer extends EloquentTransformer
{
    public function transform(Status $status)
    {
        return [
            'id' => $status->id,
            'name' => $status->name
        ];
    }
}
