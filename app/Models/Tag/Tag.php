<?php

namespace App\Models\Tag;

use App\Models\Model\Model;

use App\Models\Tag\Traits\TagRelationship;

class Tag extends Model
{
    use TagRelationship;
    /**
     * Table Name
     * @var string
     */
    protected $model = 'tag';


}
