<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_brands extends Model
{
    //
    public $timestamps = false;

    public function scopeModelsWithBrands($query)
    {
        return $query
            ->select('car_brands.*')
            ->selectRaw('GROUP_CONCAT(`car_models`.`model_name`) AS model_names')
            ->leftJoin('car_model_to_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->leftJoin('car_models', 'car_models.id', '=', 'car_model_to_brands.model_id')
            ->groupBy('car_brands.id');
    }

    public function scopeModelsByBrandName($query,$brand_name)
    {
        return $query
            ->select('car_brands.*')
            ->selectRaw('GROUP_CONCAT(`car_models`.`model_name`) AS model_names, GROUP_CONCAT(`car_models`.`picture_name` SEPARATOR "||") AS model_picture')
            ->leftJoin('car_model_to_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->leftJoin('car_models', 'car_models.id', '=', 'car_model_to_brands.model_id')
            ->where('car_brands.brand_name',$brand_name)
            ->groupBy('car_brands.id');
    }

    public function getModels($string_models){
        return explode(',',$string_models);
    }

    public function getBrandUrlAttribute(){
        return url('/'.$this->attributes['brand_name']);
    }
    public function getModelUrlAttribute($model_name){
        return url('/'.$this->attributes['brand_name'],['model_id'=>$model_name]);
    }

}
