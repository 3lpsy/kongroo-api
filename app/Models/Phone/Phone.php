<?php

namespace App\Models\Phone;

use App\Models\Model\Model;
use App\Models\Phone\Traits\PhoneCountryRelationship;
use App\Models\Phone\Traits\PhonePhoneTypeRelationship;
use App\Models\Phone\Traits\PhoneUserRelationship;


class Phone extends Model
{
    use PhoneUserRelationship,
        PhoneCountryRelationship,
        PhoneCountryRelationship;

    protected $model = "phone";

}
