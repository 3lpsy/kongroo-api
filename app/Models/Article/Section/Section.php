<?php

namespace App\Models\Article\Section;

use App\Models\Model\Model;
use App\Models\Article\Section\Traits\SectionRelationship;

class Section extends Model
{
    protected $model = 'section';

    use SectionRelationship;
}
