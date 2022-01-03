<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            [
                "name" => "Samsung Electronics",
                "description" => "Toko online resmi dari SAMSUNG ELECTRONICS Indonesia yang terpercaya menjual produk Home Appliances yang berkualitas serta bergaransi resmi.",
                "location" => "Jakarta Barat",
                "image" => "samsung logo.png",
            ],
            [
                "name" => "Sony Center",
                "description" => "Sony center Official Manage by PT.DOSSINDO Garansi Resmi PT.SONY INDONESIA.",
                "location" => "Jakarta Selatan",
                "image" => "sony center logo.png",
            ]
        ];

        DB::table('shops')->insert($shops);
    }
}
