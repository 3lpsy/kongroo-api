<?php

namespace App\Services\Illuminate\Database\Schema\Blueprint\Traits;

trait BlueprintUserAction
{
    public function actions()
    {
        collect(config("blueprint.track.actions"))->each(function ($action) {
            $this->actionInteger($action);
        });
    }

    public function fkActions()
    {
        collect(config("blueprint.track.actions"))->each(function ($action) {
            $this->fkAction($action);
        });
    }

    public function fkAction($action)
    {
        $this->fk($this->getActionColumn($action), 'users', "id");
    }

    public function actionInteger($action)
    {
        $this->fkInteger($this->getActionColumn($action));
    }

    public function getActionColumn($action)
    {
        return $action . "_by_id";
    }

    public function dropActions()
    {
        collect(config("blueprint.track.actions"))->each(function ($action) {
            $this->dropFk($this->getActionColumn($action));
        });
    }
}
