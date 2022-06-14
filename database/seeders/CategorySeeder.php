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
        Category::create(['name' => Category::BEVERAGE_CATEGORY]);
        Category::create(['name' => Category::VEGETABLE_CATEGORY]);
        Category::create(['name' => Category::CEREAL_CATEGORY]);
        Category::create(['name' => Category::ALCOHOL_CATEGORY]);
    }
}
