<?php

namespace App\Models\AppData;

use App\Models\Model\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AppData extends Model {

    use SoftDeletes;

    public $visible = ['name', 'displayName'];

    /**
     * Table Name
     * @var string
     */
    protected $table = 'app_data';


}
