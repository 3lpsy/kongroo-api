<?php

use Illuminate\Database\Seeder;

class InitSuperUserAccess extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create super user
        $superUser = factory(config('models.user.namespace'), 'super')->create();

        $superUserRole = factory(config('models.role.namespace'), 'super')->create();

        $superUserPermission = factory(config('models.permission.namespace'), 'super')->create();

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'acess-admin',
            'display_name' => 'Access Admin'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);


        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'create-tag',
            'display_name' => 'Create Tag'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'disable-tag',
            'display_name' => 'Disable Tag'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'create-category',
            'display_name' => 'Create Category'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'create-series',
            'display_name' => 'Create Series'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'delete-series',
            'display_name' => 'Delete Series'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'create-article',
            'display_name' => 'Create Article'

        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'publish-article',
            'display_name' => 'Publish Article'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'unpublish-article',
            'display_name' => 'Unpublish Article'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'attach-article-to-series',
            'display_name' => 'Attach Article to Series'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'attach-tag-to-article',
            'display_name' => 'Attach Tag to Article'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'remove-tag-from-article',
            'display_name' => 'Remove Tag From Series'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'attach-tag-to-series',
            'display_name' => 'Attach Tag to Series'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'remove-tag-from-series',
            'display_name' => 'Remove Tag From Series'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'delete-comment',
            'display_name' => 'Delete Comment'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        $superUserPermission = factory(config('models.permission.namespace'))->create([
            'name' => 'private-comment',
            'display_name' => 'Private Comment'
        ]);

        $superUserRole->permissions()->attach($superUserPermission->id);

        //attach role to user
        $superUser->roles()->attach($superUserRole->id);


        // create super user settins
        $settings = factory(config('models.user_settings.namespace'))->create();

        // attach super user settings
        $superUser->saveSettings($settings);

        $appData = factory(config('models.app_data.namespace'))->create();

    }
}
