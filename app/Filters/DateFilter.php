<?php

namespace App\Filters;

use App\Contracts\IFilters;
use Closure;
use Carbon\Carbon;

class DateFilter implements IFilters
{

    public function process($query, Closure $next){
        if(request()->has('date_filter')){
            $date_filter =  request()->input('date_filter');
            if($date_filter == 'today'){
                $date = date('Y-m-d');
                $query->whereDate('products.registered_at', Carbon::today());

            }
            elseif($date_filter == 'week') {
                $query->whereBetween('products.registered_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            }
            else{
                $query->whereMonth('products.registered_at', date('m'));
            }

        }
        return $next($query);
    }

}
