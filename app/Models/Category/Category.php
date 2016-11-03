<?php

namespace App\Models\Category;

use App\Models\Model\Model;
use App\Models\Category\Traits\Relationship\CategoryRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use CategoryRelationship, SoftDeletes;

    protected $table = "categories";
}
