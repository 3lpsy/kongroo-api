<?php

namespace App\Models\Series;

use App\Models\Model\Model;
use App\Models\Series\Traits\SeriesRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Taggable\Taggable;

class Series extends Model
{
	use SeriesRelationship, SoftDeletes, Taggable;
	/**
	 * Table Name
	 * @var string
	 */
    protected $table = 'series';
}
