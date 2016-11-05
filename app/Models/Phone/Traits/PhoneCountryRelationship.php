<?php

namespace App\Models\Phone\Traits;

use App\Models\Geo\Country\Country;

trait PhoneCountryRelationship
{
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
