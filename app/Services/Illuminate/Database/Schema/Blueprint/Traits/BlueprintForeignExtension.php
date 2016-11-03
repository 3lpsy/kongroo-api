<?php

namespace App\Services\Illuminate\Database\Schema\Blueprint\Traits;

trait BlueprintForeignExtension
{

    public function fkInteger($column) {
        $this->integer($column)->unsigned()->nullable();
    }
    
    public function fk($localKey, $on = null, $foreignKey = null, $update = "CASCADE", $delete = "SET NULL",  $name = false)
    {
        $on = $on ?: $this->tableFromFk($localKey);

        $foreignKey = $foreignKey ?: "id";

        $this->foreign($localKey, $this->getForeignIndexForKey($localKey))
                ->references($foreignKey)
                ->on($on)
                ->onUpdate($update)
                ->onDelete($delete);
    }

    protected function getForeignIndexForKey($key) 
    {
        $standardFkIndex = $this->standardForeignIndex($key);

        return strlen($standardFkIndex) >= 32 ? $standardFkIndex : $this->hashedForeignIndex($key);
    }

    protected function standardForeignIndex($key)
    {
        return "{$this->table}_{$key}_foreign";
    }

    protected function hashedForeignIndex($key)
    {
        return md5("fk_" . $this->standardForeignIndex($key));
    }

    public function dropFk($key) 
    {
        $this->dropForeign($this->getForeignIndexForKey($key));
    }

}