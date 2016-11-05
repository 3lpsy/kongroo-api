<?php

namespace App\Models\Image;

use App\Models\Model\Model;
use App\Models\Image\Traits\ImageRelationship;

class Image extends Model
{
    use ImageRelationship;
    /**
     * Table Name
     * @var string
     */
    protected $model = "image";
}
