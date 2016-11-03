<?php

use App\Services\Illuminate\Database\Schema\Blueprint\Blueprint;
use App\Services\Illuminate\Database\Migrations\Migration;

class FkUserActionsBulk extends Migration
{
    public $tableNames;

    public function __construct() {
        $this->tableNames = collect([
              "users", "series", "articles",
              "comments", "tags", "taggables", "article_series",
              "images", "categories", 'categoricals',
              "views", "roles", "permissions", "role_user",
              "permission_role", 'statuses', 'phones', 'user_settings' ,
              'phone_types', 'countries',
              'article_sections', 'article_section_types',
          ]);
    }

    public function up()
    {
        $this->tableNames->each(function($tableName) {

            $this->schema()->table($tableName, function(Blueprint $table) {

                $table->trackableTimestampsForeign();

                $table->softDeletesForeign();

            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->tableNames->each(function($tableName) {
            $this->schema()->table($tableName, function(Blueprint $table) use ($tableName) {
                $table->dropTrackableTimestampsForeign($tableName);
                $table->dropSoftDeletesForeign($tableName);
            });
        });
    }
}
