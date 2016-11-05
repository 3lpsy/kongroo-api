<?php

namespace App\Models\Model\Traits;

use App\Models\Status\Status;

trait ModelRelationshipHelpers
{

        public function updateCreatedBy($user)
        {
            $this->created_by_id = $user->id;
            $this->save();
        }

        public function updateUpdatedBy($user)
        {
            $this->updated_by_id = $user->id;
            $this->save();
        }

        public function updateDeletedBy($user)
        {
            $this->deleted_by_id = $user->id;
            $this->save();
        }

        public function updateRestoredBy($user)
        {
            $this->restored_by_id = $user->id;
            $this->save();
        }
}
