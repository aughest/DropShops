<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category_id' => '1',
                'shop_id' => '2',
                'name' => 'Camera Sony',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'camera-products.jpg'
            ],
            [
                'category_id' => '2',
                'shop_id' => '1',
                'name' => 'Smartphone Samsung',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'smartphone.jpg'
            ],
            [
                'category_id' => '3',
                'shop_id' => '1',
                'name' => 'Laptop Samsung',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'laptop.jpg'
            ],
            [
                'category_id' => '4',
                'shop_id' => '1',
                'name' => 'television Samsung',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'television.jpg'
            ],
            [
                'category_id' => '5',
                'shop_id' => '1',
                'name' => 'Smartwatch Samsung',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'smartwatch.jpg'
            ],
            [
                'category_id' => '6',
                'shop_id' => '1',
                'name' => 'Headphone Samsung',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'headphone.jpg'
            ],
            [
                'category_id' => '7',
                'shop_id' => '2',
                'name' => 'Earphone Sony',
                'price' => '10000000',
                'description' => 'Canon EOS M50 Kit EF-M 15-45mm IS STM merupakan kamera mirrorless yang dilengkapi dengan fitur serbaguna yang cocok untuk stills maupun video, dengan UHD 4K video recording, high-resolution electronic viewfinder dan Dual Pixel CMOS AF dengan Eye Detection AF yang telah ditingkatkan. Memanfaatkan 24.1MP APS-C CMOS sensor dan DIGIC 8 image processor dengan Auto Lighting Optimizer yang membantu memastikan kualitas gambar yang bersih dari low noise, 10 fps shooting rate dan rentang sensitivitas ISO 100-25600, yang dapat diperluas ke ISO 51200 untuk bekerja dalam kondisi low-light.',
                'image' => 'earphone.jpg'
            ],
        ];

        DB::table('products')->insert($products);
    }
}
