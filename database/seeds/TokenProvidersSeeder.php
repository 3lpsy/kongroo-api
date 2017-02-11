<?php

use Illuminate\Database\Seeder;

class TokenProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = factory(config('models.token_provider.namespace'))
            ->create([
                'name' => "twilio",
                'display_name' => 'Twilio',
                'description' => "SMS Service Provider"
            ]);

        $series = factory(config('models.token_provider.namespace'))
            ->create([
                'name' => "local",
                'display_name' => 'Local',
                'description' => "Local Provider"
            ]);
    }
}
