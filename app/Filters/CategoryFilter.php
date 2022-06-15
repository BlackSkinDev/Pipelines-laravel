<?php

namespace App\Filters;

use App\Contracts\IFilters;
use Closure;

class CategoryFilter implements IFilters
{

    public function process($query, Closure $next){
        if(request()->has('categories')){
            $categories = request()->input('categories');
            $query->whereIn('categories.id', $categories);
        }
        return $next($query);
    }

}
