<?php

namespace App\Models\Tag;

use App\Models\Model\Model;
use App\Models\Tag\Traits\Relationship\TagRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use TagRelationship, SoftDeletes;
	/**
	 * Table Name
	 * @var string
	 */
    protected $table = 'tags';


}
