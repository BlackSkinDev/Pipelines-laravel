<?php

namespace App\Services;

use App\Filters\DateFilter;
use App\Filters\CategoryFilter;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\DB;
use App\Filters\PerishableProbabilityFilter;



class ProductService
{

    public function getAllProducts()
    {

        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.name AS categoryName','products.*')
        ->orderBy('categories.name','asc')
        ->orderBy('products.name','asc')->get()->groupBy(function ($data){
            return $data->categoryName;
        });

        return $products;
    }

    public function filter($request)
    {
        $query = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id');

        $products = app(Pipeline::class)
                ->send($query)
                ->through([
                    CategoryFilter::class,
                    PerishableProbabilityFilter::class,
                    DateFilter::class,
                ])
                ->via('process')
                ->thenReturn()
                ->select('categories.name AS categoryName','products.*')
                ->orderBy('categories.name','asc')
                ->orderBy('products.name','asc')->get()->groupBy(function ($data){
                    return $data->categoryName;
                });
        return $products;
    }
}
