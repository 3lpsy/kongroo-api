<?php

use Illuminate\Database\Seeder;

class TokenTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = factory(config('models.token_type.namespace'))
            ->create([
                'name' => "sms",
                'display_name' => 'SMS',
                'description' => "SMS"
            ]);

        $series = factory(config('models.token_type.namespace'))
            ->create([
                'name' => "email",
                'display_name' => 'Email',
                'description' => "Email"
            ]);

        $series = factory(config('models.token_type.namespace'))
            ->create([
                'name' => "password",
                'display_name' => 'Password',
                'description' => "Password"
            ]);
    }
}
