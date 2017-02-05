<?php

use Illuminate\Database\Seeder;

class InitSeederAccess extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superbot = factory(config('models.user.namespace'), 'super-bot')
            ->create()->first();

        $superbotPermission = factory(config('models.permission.namespace'), 'super-bot')
            ->create()->first();

        $superbotRole = factory(config('models.role.namespace'), 'super-bot')
            ->create()->first();
        $superbotRole->permissions()->attach($superbotPermission);

        $superbot->roles()->attach($superbotRole);

    }
}
