<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Camera', 'image' => 'camera.jpg'],
            ['name' => 'Smartphone', 'image' => 'smartphone.jpg'],
            ['name' => 'Laptop', 'image' => 'laptop.jpg'],
            ['name' => 'Television', 'image' => 'television.jpg'],
            ['name' => 'Smartwatch', 'image' => 'smartwatch.jpg'],
            ['name' => 'Headphone', 'image' => 'headphone.jpg'],
            ['name' => 'Earphone', 'image' => 'earphone.jpg'],
            ['name' => 'Speaker', 'image' => 'speaker.jpg']
        ];

        DB::table('categories')->insert($categories);
    }
}
