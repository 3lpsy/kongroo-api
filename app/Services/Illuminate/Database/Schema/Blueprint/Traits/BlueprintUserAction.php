<?php

namespace App\Services\Illuminate\Database\Schema\Blueprint\Traits;

trait BlueprintUserAction
{
    public function actions()
    {
        collect(config("blueprint.track.actions"))->each(function ($action) {
            $this->action($action);
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

    public function action($action)
    {
        $this->fkInteger($this->getActionColumn($action), config("blueprint.user_size"));
    }

    public function getActionColumn($action)
    {
        return $action . "_by_id";
    }

    public function dropActions()
    {
        collect(config("blueprint.track.actions"))->each(function ($action) {
            $this->dropAction($action);
        });
    }
    public function dropAction($action)
    {
        $this->dropFk($this->getActionColumn($action));
    }
}
