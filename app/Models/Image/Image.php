<?php

namespace App\Models\Image;

use App\Models\Model\Model;
use App\Models\Image\Traits\Relationship\ImageRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
	use ImageRelationship, SoftDeletes;
	/**
	 * Table Name
	 * @var string
	 */
    protected $table = "images";
}
