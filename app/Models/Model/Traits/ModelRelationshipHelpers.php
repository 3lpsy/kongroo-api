<?php

namespace App\Models\Model\Traits;

use App\Models\Status\Status;

trait ModelRelationshipHelpers
{

     public function statusIs($status) {
         return $this->status->name == $status;
     }

     public function changeStatus($statusName) {
         $this->status_id = Status::byName($statusName)->id;
         $this->save();
         return $this;
     }

     public function changeUpdatedBy($userOrId) {
         $this->changeActionUser($userOrId, 'updated_by_id');
         return $this;
     }

     public function changeCreatedBy($userOrId) {
         $this->changeActionUser($userOrId, 'created_by_id');
         return $this;
     }

    public function changeDeletedBy($userOrId) {
        $this->changeActionUser($userOrId, 'deleted_by_id');
        return $this;
    }

    public function changeActionUser($userOrId, $field) {
         $user = $userOrId;
         if (is_object($user)) {
             $user = $user->id;
         }
         $this->$field = $user;
         $this->save();
    }

}