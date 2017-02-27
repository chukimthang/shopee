<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,20) as $index) {
            DB::table('collections')->insert([
                'name' => rtrim($faker->text(15), '.'),
                'shop_id' => 1
            ]);
        }

        foreach (range(1,200) as $index) {
            DB::table('collections')->insert([
                'name' => rtrim($faker->text(15), '.'),
                'shop_id' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
