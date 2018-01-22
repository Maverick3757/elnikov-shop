<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Car_models extends Model
{
    //
    public $timestamps = false;

    public function scopeModelsByBrandName($query,$brand_name)
    {
        return $query
            ->select('car_models.*')
            ->leftJoin('car_model_to_brands', 'car_models.id', '=', 'car_model_to_brands.model_id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->where('car_brands.brand_name',$brand_name);

    }



}
