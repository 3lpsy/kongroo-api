<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model as BaseModel;
use App\Models\Model\Traits\ModelRelationship;
use App\Models\Model\Traits\ModelStaticHelpers;
use App\Models\Model\Traits\ModelRelationshipHelpers;

abstract class Model extends BaseModel
{
    use ModelRelationship, ModelStaticHelpers, ModelRelationshipHelpers;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

}
