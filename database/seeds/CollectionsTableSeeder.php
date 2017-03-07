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

        $collections = [
            'Áo sơ mi',
            'Áo phông',
            'Quần bò',
            'Quần âu',
            'Áo vest',
        ];

        for($i = 0; $i < count($collections); $i++) {
            DB::table('collections')->insert([
                'name' => $collections[$i],
                'shop_id' => 1
            ]);
        }

        foreach (range(1,300) as $index) {
            DB::table('collections')->insert([
                'name' => rtrim($faker->text(15), '.'),
                'shop_id' => $faker->numberBetween(2, 100)
            ]);
        }
    }
}
