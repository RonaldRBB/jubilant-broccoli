<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Aplica filtros
     * @param Illuminate\Database\Eloquent\Model\query $query
     * @param string $filter
     * @param string $value
     * @return void
     */
    public function applyFilter($query, $filter, $value)
    {
        if (is_array($value)) {
            $query->where(function ($query) use ($filter, $value) {
                foreach ($value as $item) {
                    $query->orWhere($filter, $item);
                }
            });
        } else {
            $query->where($filter, $value);
        }
    }
}
