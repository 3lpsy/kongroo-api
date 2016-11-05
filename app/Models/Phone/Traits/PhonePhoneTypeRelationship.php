<?php

namespace App\Models\Phone\Traits;

use App\Models\Phone\Type\PhoneType;

trait PhonePhoneTypeRelationship
{

    public function type()
    {
        return $this->belongsTo(config("models.phone_type.namespace"), 'type_id');
    }

    public function changeTypeByName($name)
    {
        $type = PhoneType::byName($name);
        $this->saveType($type);
    }

    public function saveType($type) {
        $this->update(['type_id' => $type->id]);
    }
}
