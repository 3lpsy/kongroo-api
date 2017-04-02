<?php
namespace App\Transformers\Eloquent\Admin\Series;

use App\Transformers\Eloquent\Admin\EloquentTransformer;
use App\Models\Series\Series;

class ApiSeriesTransformer extends EloquentTransformer
{
    public function transform(Series $series)
    {
        return [
            'id' => (int) $series->id,
            'title' => $series->title
        ];
    }
}
