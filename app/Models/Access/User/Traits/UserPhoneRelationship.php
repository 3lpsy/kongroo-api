<?php

namespace App\Models\Access\User\Traits;

trait UserPhoneRelationship {


    public function phone() {
        return $this->hasMany(config("models.phone.namespace"));
    }

    public function savePhone($phone)
    {
        $this->phone()->save($phone);
        return $this->save();
    }

}
