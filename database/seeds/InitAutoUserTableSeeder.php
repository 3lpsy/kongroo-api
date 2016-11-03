<?php

use Illuminate\Database\Seeder;

class InitAutoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table("users")->truncate();
        \DB::table("role_user")->truncate();
        \DB::table("permission_role")->truncate();
        \DB::table("roles")->truncate();
        \DB::table("permissions")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $superbot = factory(config('models.user.class'), 'super-bot')->create();
        $superbot->changeStatus("active");
        $superbot->changeCreatedBy($superbot);
        $superbot->changeUpdatedBy($superbot);

        $superbotPermission = factory(config('models.permission.class'), 'super-bot')->create();
        $superbotPermission->changeStatus("active");
        $superbotPermission->changeCreatedBy($superbot);
        $superbotPermission->changeUpdatedBy($superbot);

        $superbotRole = factory(config('models.role.class'), 'super-bot')->create();
        $superbotRole->changeStatus("active");
        $superbotRole->changeCreatedBy($superbot);
        $superbotRole->changeUpdatedBy($superbot);

        $superbotRole->permissions()->attach($superbotPermission);

        $superbot->roles()->attach($superbotRole);

    }
}
