<?php

namespace App\Traits;
use App\Traits\SearchModel;

trait SearchModel
{
    public function SearchModel($model, $columns, $table_filter_search = '')
    {
        $model = '\\App\\Models\\'.$model;
        $builder = $model::query();

        foreach ($columns as $value) 
        {
            $builder = $builder->orWhere($value, 'LIKE', "%".$table_filter_search."%");
        }
        
        return $builder;
    }
}