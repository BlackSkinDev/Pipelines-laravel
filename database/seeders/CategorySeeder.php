<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            [
                'name'=>Category::BEVERAGE_CATEGORY
            ],
            [
                'name'=>Category::VEGETABLE_CATEGORY
            ],
            [
                'name'=>Category::CEREAL_CATEGORY
            ],
            [
                'name'=>Category::ALCOHOL_CATEGORY
            ],
        ];

        Category::insert($categories);
    }
}
