<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        $categories = (new CategoryService())->getAllCategories();
        $products = $this->productService->getAllProducts();
        return view('welcome', compact('categories','products'));
    }

    public function filter(Request $request)
    {
        $products = $this->productService->filter($request);
        return view('ajax-response', compact('products'));
    }
}
