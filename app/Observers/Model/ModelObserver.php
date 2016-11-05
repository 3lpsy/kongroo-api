<?php

namespace App\Observers\Model;

use App\Models\Model\Model;
use App\Models\Access\AuthUser\AuthUser;

class ModelObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function seeded(Model $model)
    {

        $user = AuthUser::seeder();

        if (! $user) {
            return;
        }

        if ($user && in_array("created", $model->track) && ! $model->created_by_id) {

            if ($user) {
                $model->updateCreatedBy($user);
            }

        }

        if ($user && in_array("updated", $model->track) && ! $model->updated_by_id) {

            if ($user) {
                $model->updateUpdatedBy($user);
            }

        }
    }

    public function created(Model $model)
    {

        // $user = \Auth::user();
        $user = null;

        if ($user && $in_array("created", $model->track)) {

            if ($user) {
                $model->updateCreatedBy($user);
            }

        }

         if ($user && in_array("updated", $model->track) && ! $model->created_by_id) {

            if ($user) {
                $model->updateCreatedBy($user);
            }

        }


    }

    public function updated(Model $model)
    {

        // $user = \Auth::user();
        $user = null;


        if ($user && in_array("updated", $model->track) && ! $model->updated_by_id) {

            if ($user) {
                $model->updateUpdatedBy($user);
            }

        }

    }

}
