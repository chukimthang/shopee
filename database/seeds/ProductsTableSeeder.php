<?php

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

        foreach (range(1,50) as $index) {
            DB::table('products')->insert([
                'name' => rtrim($faker->text(15), '.'),
                'code'  => $faker->text(5),
                'price' => $faker->numberBetween(5, 100000) * 1000,
                'quantity' => $faker->numberBetween(1, 100),
                'discount' => $faker->numberBetween(1, 50),
                'point_rate' => $faker->numberBetween(1, 5),
                'description' => $faker->text(200),
                'status' => $faker->numberBetween(1, 4),
                'category_id' => 2,
                'shop_id' => 1
            ]);
        }

        for ($i = 0; $i < 200; $i++) { 
            DB::table('images')->insert([
                'url' => $faker->imageUrl(320, 320),
                'product_id' => $faker->numberBetween(1, 50)
            ]);
        }

        for($i = 0; $i < 50; $i++) {
            DB::table('product_collections')->insert([
                'product_id' => $faker->numberBetween(1, 50),
                'collection_id' => $faker->numberBetween(1, 5)
            ]);
        }

        foreach (range(1,500) as $index) {
            DB::table('products')->insert([
                'name' => rtrim($faker->text(15), '.'),
                'code'  => $faker->text(5),
                'price' => $faker->numberBetween(5, 100000) * 1000,
                'quantity' => $faker->numberBetween(1, 100),
                'discount' => $faker->numberBetween(1, 50),
                'point_rate' => $faker->numberBetween(1, 5),
                'description' => $faker->text(200),
                'status' => $faker->numberBetween(1, 4),
                'category_id' => $faker->numberBetween(1, 5),
                'shop_id' => $faker->numberBetween(2, 100)
            ]);
        }

        for ($i = 0; $i < 2000; $i++) { 
            DB::table('images')->insert([
                'url' => $faker->imageUrl(320, 320),
                'product_id' => $faker->numberBetween(51, 550)
            ]);
        }

        for($i = 1; $i < 500; $i++) {
            DB::table('product_collections')->insert([
                'product_id' => $faker->numberBetween(51, 550),
                'collection_id' => $faker->numberBetween(6, 305)
            ]);
        }
    }
}
