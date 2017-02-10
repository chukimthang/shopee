<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Chử Kim Thắng',
            'email' => 'chukimthang94@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01649396961',
            'avatar' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWXoGSJC7rKeQjngG-7dfU03Aa7vZ9V0kcBPOuiFc0ltTMmUQg',
            'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Trịnh Thị Hoa',
            'email' => 'trinhhoa21081995@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '01646179365',
            'avatar' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWXoGSJC7rKeQjngG-7dfU03Aa7vZ9V0kcBPOuiFc0ltTMmUQg',
            'is_admin' => 0
        ]);

        foreach (range(1,20) as $index) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email'  => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456789',
                'avatar' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWXoGSJC7rKeQjngG-7dfU03Aa7vZ9V0kcBPOuiFc0ltTMmUQg',
                'is_admin' => 0
            ]);
        }
    }
}
