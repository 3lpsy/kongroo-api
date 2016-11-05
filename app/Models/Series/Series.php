<?php

namespace App\Models\Series;

use App\Models\Model\Model;
use App\Models\Series\Traits\SeriesRelationship;
use App\Models\Traits\Taggable\Taggable;

class Series extends Model
{
    use SeriesRelationship, Taggable;
    /**
     * Table Name
     * @var string
     */
    protected $model = 'series';
}
