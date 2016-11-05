<?php

namespace App\Models\Access\User\Traits;

trait UserUserSettingsRelationship
{

    public function settings() {
        return $this->belongsTo(config("models.user_settings.namespace"), 'settings_id');
    }
    public function saveSettings($settings)
    {
        return $this->update(['settings_id' => $settings->id]);
    }
}
