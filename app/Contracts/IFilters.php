<?php

namespace App\Contracts;

use Closure;

// interface to be implemented by all Filter classes

interface IFilters{

    public function process($query, Closure $next);

}
