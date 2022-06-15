<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    CONST BEVERAGE_CATEGORY = 'beverages';
    CONST VEGETABLE_CATEGORY = 'vegetables';
    CONST CEREAL_CATEGORY = 'cereals';
    CONST ALCOHOL_CATEGORY = 'alcohols';

    public static function getBeverageCategory(){
        return self::BEVERAGE_CATEGORY;
    }

    public static function getVegetableCategory(){
        return self::VEGETABLE_CATEGORY;
    }

    public static function getCerealCategory(){
        return self::CEREAL_CATEGORY;
    }

    public static function getAlcoholCategory(){
        return self::ALCOHOL_CATEGORY;
    }

}
