<?php

use Illuminate\Database\Seeder;

class InitSuperUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create super user
        $superUser = factory(config('models.user.class'), 'super')->create();
        $superUser->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);

        $superUserRole = factory(config('models.role.class'), 'super')->create();
        $superUserRole->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);

        $superUserPermission = factory(config('models.permission.class'), 'super')->create();
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'acess-admin',
            'display_name' => 'Access Admin'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);


        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'create-tag',
            'display_name' => 'Create Tag'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'disable-tag',
            'display_name' => 'Disable Tag'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'create-category',
            'display_name' => 'Create Category'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'create-series',
            'display_name' => 'Create Series'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'delete-series',
            'display_name' => 'Delete Series'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'create-article',
            'display_name' => 'Create Article'

        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'publish-article',
            'display_name' => 'Publish Article'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'unpublish-article',
            'display_name' => 'Unpublish Article'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'attach-article-to-series',
            'display_name' => 'Attach Article to Series'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'attach-tag-to-article',
            'display_name' => 'Attach Tag to Article'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'remove-tag-from-article',
            'display_name' => 'Remove Tag From Series'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'attach-tag-to-series',
            'display_name' => 'Attach Tag to Series'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'remove-tag-from-series',
            'display_name' => 'Remove Tag From Series'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'delete-comment',
            'display_name' => 'Delete Comment'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.class'))->create([
            'name' => 'private-comment',
            'display_name' => 'Private Comment'
        ]);
        $superUserPermission->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
        $superUserRole->permissions()->attach($superUserPermission->id);

        //attach role to user
        $superUser->roles()->attach($superUserRole->id);

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table("phones")->truncate();
        \DB::table("phone_types")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //create cell phone type
        $cellPhoneType = factory(config('models.phoneType.class'), 'cell')->create();
        $cellPhoneType ->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);


        //create super user phone
        $phone = factory(config('models.phone.class'))->create();
        $phone->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);

        // attach phone type to phone
        $phone->changeTypeByName("cell");

        // attach country to type
        $phone->changeCountryByCode('US');

        // attach phone to user
        $superUser->savePhone($phone);

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table("user_settings")->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // create super user settins
        $settings = factory(config('models.userSettings.class'))->create();
        $settings->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);

        // attach super user settings
        $superUser->saveSettings($settings);

        \DB::table("app_data")->truncate();
        $appData = factory(config('models.appData.class'))->create();

        $appData->changeStatus("active")
            ->changeCreatedBy($superUser)
            ->changeUpdatedBy($superUser);
    }
}
