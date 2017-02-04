<?php

use App\Models\Image\Image;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = factory(config('models.image.namespace'), 4)->create();
    }
}
