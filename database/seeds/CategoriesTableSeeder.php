<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Mỹ phẩm',
            'Thời trang',
            'Nội thất',
            'Đồ điện gia dụng',
            'Thiết bị điện tử',
        ];
        for($i = 0; $i < count($category); $i++) {
            DB::table('categories')->insert([
                'name' => $category[$i]
            ]);
        }
    }
}
