<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkVideoVideoSourceTable extends Migration
{
    public $table = 'video_video_source';

    public function up()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->fkActions();

            $table->fk('video_id');
            $table->fk('video_source_id');
        });
    }

    public function down()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->dropFk('video_id');
            $table->dropFk('video_source_id');
            $table->dropActions();
        });
    }
}
