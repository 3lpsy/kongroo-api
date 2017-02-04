<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkContentVideoTable extends Migration
{
    public $table = 'content_video';

    public function up()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->fk('video_id');

            $table->fkActions();
        });
    }

    public function down()
    {
        $this->schema()->table($this->table, function (Blueprint $table) {
            $table->dropFk("video_id");

            $table->dropActions();
        });
    }
}
