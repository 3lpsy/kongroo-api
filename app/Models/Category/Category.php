<?php

namespace App\Models\Category;

use App\Models\Model\Model;
use App\Models\Category\Traits\CategoryRelationship;

class Category extends Model
{
    use CategoryRelationship;

    protected $model = "category";
}
