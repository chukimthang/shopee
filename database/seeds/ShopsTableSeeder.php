<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('shops')->insert([
            'name' => 'Hoa Shop',
            'address' => 'Ha Noi',
            'status' => 0,
            'description' => $faker->paragraph(
                $nbSentences = 50, 
                $variableNbSentences = true
            ),
            'image' => $faker->imageUrl(320, 320),
            'category_id' => 2,
            'user_id' => 2
        ]);

        foreach (range(1,100) as $index) {
            DB::table('shops')->insert([
                'name' => rtrim($faker->text(30), '.'),
                'address'  => $faker->address(),
                'status' => 0,
                'description' => $faker->paragraph(
                    $nbSentences = 50, 
                    $variableNbSentences = true
                ),
                'image' => $faker->imageUrl(320, 320),
                'category_id' => $faker->numberBetween(1, 5),
                'user_id' => $faker->numberBetween(2, 100),
            ]);
        }
    }
}
