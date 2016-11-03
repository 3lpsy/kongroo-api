<?php

namespace App\Models\Phone;

use App\Models\Model\Model;
use App\Models\Phone\PhoneType;
use App\Models\Geo\Country\Country;

class Phone extends Model
{
    protected $table = "phones";

    public function user()
    {
        return $this->belongsTo(config("models.user.namespace"), 'user_id');
    }

    public function type()
    {
        return $this->belongsTo(config("models.phoneType.namespace"), 'type_id');
    }

    public function changeTypeByName($name)
    {
        $type = PhoneType::byName($name);
        $this->saveType($type);
    }

    public function saveType($type) {
        $this->update(['type_id' => $type->id]);
    }

    public function changeCountryByCode($code)
    {
       $country = Country::byCode($code);
       $this->saveCountry($country);
    }

    public function saveCountry($country) {
        $this->update(['country_id' => $country->id]);
    }

    public function country()
    {
        return $this->belongsTo(config("models.country.namespace"), 'country_id');
    }

}
