<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class CreateFailedJobsTable extends Migration
{

    public $table = 'failed_jobs';

    public function up()
    {
        $this->schema()->create($this->table, function (Blueprint $table) {

            $table->increments('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    public function down()
    {

         $this->schema()->dropIfExists($this->table);

    }
}
