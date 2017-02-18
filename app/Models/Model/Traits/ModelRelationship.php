<?php

namespace App\Models\Model\Traits;

trait ModelRelationship
{
    public function creator()
    {
        return $this->belongsTo(config("models.user.namespace"), "created_by_id");
    }

    public function updater()
    {
        return $this->belongsTo(config("models.user.namespace"), "updated_by_id");
    }

    public function restorer()
    {
        return $this->belongsTo(config("models.user.namespace"), "restored_by_id");
    }

    public function destroyer()
    {
        return $this->belongsTo(config("models.user.namespace"), "deleted_by_id");
    }
}
