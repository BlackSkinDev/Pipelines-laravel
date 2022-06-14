<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.name AS categoryName','products.*')
        ->orderBy('categories.name','asc')
        ->orderBy('products.name','asc')->get()->groupBy(function ($data){
            return $data->categoryName;
        });
        return view('welcome', compact('categories','products'));
    }
}
