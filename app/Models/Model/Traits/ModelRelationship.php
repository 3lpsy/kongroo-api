<?php

namespace App\Models\Model\Traits;

trait ModelRelationship
{
    public function status() {
        return $this->belongsTo(config("models.status.namespace"), "status_id");
    }

    public function createdBy() {
        return $this->belongsTo(config("models.user.namespace"), "created_by_id");
    }

    public function updatedBy() {
        return $this->belongsTo(config("models.user.namespace"), "updated_by_id");
    }

    public function deletedBy() {
        return $this->belongsTo(config("models.user.namespace"), "deleted_by_id");
    }
}