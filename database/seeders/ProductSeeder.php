<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beverageCategory = Category::where('name',Category::getBeverageCategory())->first();
        $cerealCategory = Category::where('name',Category::getCerealCategory())->first();
        $vegetableCategory =  Category::where('name',Category::getVegetableCategory())->first();
        $alcoholCategory =  Category::where('name',Category::getAlcoholCategory())->first();


        $products = [
            [
               'name'=>'Coca-Cola',
               'registered_at'=> Carbon::now()->toDateTimeString(),
               'type_a_perish_probability' =>78,
               'type_b_perish_probability' =>22,
               'category_id'=>$beverageCategory->id
            ],
            [
                'name'=>'Pepsi',
                'registered_at'=> Carbon::now()->toDateTimeString(),
                'type_a_perish_probability' =>50,
                'type_b_perish_probability' =>50,
                'category_id'=>$beverageCategory->id
            ],
            [
                'name'=>'Cway Nutri Milk',
                'registered_at'=> Carbon::now()->toDateTimeString(),
                'type_a_perish_probability' =>58,
                'type_b_perish_probability' =>42,
                'category_id'=>$beverageCategory->id
            ],
            [
                'name'=>'Chivita',
                'registered_at'=> Carbon::now()->toDateTimeString(),
                'type_a_perish_probability' =>70,
                'type_b_perish_probability' =>30,
                'category_id'=>$beverageCategory->id
            ],
            [
                'name'=>'Lucozade Booost',
                'registered_at'=> Carbon::now()->toDateTimeString(),
                'type_a_perish_probability' =>69,
                'type_b_perish_probability' =>31,
                'category_id'=>$beverageCategory->id
            ],
            [
                'name'=>'Nescafe',
                'registered_at'=> Carbon::now()->toDateTimeString(),
                'type_a_perish_probability' =>82,
                'type_b_perish_probability' =>18,
                'category_id'=>$beverageCategory->id
            ],
            [
                'name'=>'Lettuce',
                'registered_at'=> '2022-06-17 22:15:00',
                'type_a_perish_probability' =>50,
                'type_b_perish_probability' =>50,
                'category_id'=>$vegetableCategory->id
            ],
            [
                'name'=>'Cucumbers',
                'registered_at'=> '2022-06-15 22:15:00',
                'type_a_perish_probability' =>60,
                'type_b_perish_probability' =>40,
                'category_id'=>$vegetableCategory->id
            ],
            [
                'name'=>'Broccoli',
                'registered_at'=> '2022-06-30 22:15:00',
                'type_a_perish_probability' =>40,
                'type_b_perish_probability' =>39,
                'category_id'=>$vegetableCategory->id
            ],

            [
                'name'=>'Rice',
                'registered_at'=> '2022-06-18 22:15:00',
                'type_a_perish_probability' =>90,
                'type_b_perish_probability' =>19,
                'category_id'=>$cerealCategory->id
            ],

            [
                'name'=>'Oats',
                'registered_at'=> '2022-06-28 22:15:00',
                'type_a_perish_probability' =>50,
                'type_b_perish_probability' =>69,
                'category_id'=>$cerealCategory->id
            ],

            [
                'name'=>'Corn Flakes',
                'registered_at'=> '2022-06-15 22:15:00',
                'type_a_perish_probability' =>50,
                'type_b_perish_probability' =>79,
                'category_id'=>$cerealCategory->id
            ],

            [
                'name'=>'Mcdowells',
                'registered_at'=> '2022-06-15 22:15:00',
                'type_a_perish_probability' =>40,
                'type_b_perish_probability' =>69,
                'category_id'=>$alcoholCategory->id
            ],

            [
                'name'=>'Andre',
                'registered_at'=> '2022-06-16 22:15:00',
                'type_a_perish_probability' =>30,
                'type_b_perish_probability' =>39,
                'category_id'=>$alcoholCategory->id
            ],

            [
                'name'=>'Champagne',
                'registered_at'=> '2022-06-29 22:15:00',
                'type_a_perish_probability' =>70,
                'type_b_perish_probability' =>39,
                'category_id'=>$alcoholCategory->id
            ],

            [
                'name'=>'Azul',
                'registered_at'=> '2022-06-19 22:15:00',
                'type_a_perish_probability' =>10,
                'type_b_perish_probability' =>90,
                'category_id'=>$alcoholCategory->id
            ],

        ];

        Product::insert($products);
    }
}
