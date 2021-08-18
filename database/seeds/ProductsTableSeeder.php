<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        for ($i=0; $i < 60 ; $i++) { 
            Product::create([
                'title' => $faker->sentence(5),
                'slug' => $faker->slug,
                'subtitle' => $faker->sentence(8),
                'description' => $faker->text,
                'price' => $faker->numberBetween(10, 200) * 100,
                'image' => 'https://via.placeholder.com/336×336',
                'image_detail' => 'https://via.placeholder.com/536×336'
            ]);
        }
    }
}
