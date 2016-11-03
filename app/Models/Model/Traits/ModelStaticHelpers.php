<?php

namespace App\Models\Model\Traits;

trait ModelStaticHelpers
{

    public static function deleteIfExists($id, $keyName = null)
    {
        $keyName = $keyName ?: static::getKeyName;
        if (static::where($keyName, $id)->first()) {
            static::where($keyName, $id)->first()->delete();
        }
    }
    public static function deleteAllIfExists($id, $keyName = null)
    {
        \Log::info("deleteAllIfExists({$id}, $keyName)");
        $keyName = $keyName ?: static::getKeyName();
        if ($model = static::where($keyName, $id)->get()) {
            \Log::info("Exists and deleting!");
            $model = static::where($keyName, $id)->delete();
            return true;
        }
        \Log::info("Does not exist!");
        return false;

    }

}