<?php

use Illuminate\Database\Seeder;

class UpdatedStatusesUserActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusModel = config('models.status.class');
        $statuses = $statusModel::all()
    }
}
