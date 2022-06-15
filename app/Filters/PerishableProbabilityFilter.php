<?php

namespace App\Filters;

use App\Contracts\IFilters;
use Closure;

class PerishableProbabilityFilter implements IFilters
{

    public function process($query, Closure $next){
        if(request()->has('probability_type')){
            $prob_filter = request()->input('probability_type');
            if (!empty($prob_filter)) {
                $whereClause = "(";
                $flag = false;

                if(in_array('high',$prob_filter,)){
                    $whereClause .= "(products.type_a_perish_probability >= 70 OR products.type_b_perish_probability >= 70)";
                    $flag = true;
                }

                if(in_array('moderate',$prob_filter,)){
                    if ($flag) $whereClause .= " OR ";
                    $whereClause .= "((products.type_a_perish_probability >= 50 AND products.type_a_perish_probability < 70) AND (products.type_b_perish_probability >= 50 AND products.type_b_perish_probability  < 70))";
                    $flag = true;
                }

                if(in_array('low',$prob_filter,)){
                    if ($flag) $whereClause .= " OR ";
                    $whereClause .= "(products.type_a_perish_probability  < 50 AND products.type_b_perish_probability < 50)";
                    $flag = true;
                }
                $whereClause.= ")";
                $query->whereRaw($whereClause);
            }

        }
        return $next($query);
    }

}
