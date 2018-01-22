<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_to_products extends Model
{
    //
    public $timestamps = false;


    public function scopeCategoryForCars($query, $brand_name, $model_name, $engine_id)
    {
        return $query
            ->selectRaw('engine_to_package.engine,products_category.category_name,products_category.picture_name, products_category.id,engine_to_package.id as engine_id')
            ->leftJoin('cars_to_products', 'cars_to_products.product_id', '=', 'category_to_products.product_id')
            ->leftJoin('engine_to_package', 'cars_to_products.engine_id', '=', 'engine_to_package.id')
            ->leftJoin('products_category', 'products_category.id', '=', 'category_to_products.category_id')
            ->leftJoin('car_package', 'car_package.id', '=', 'engine_to_package.package_id')
            ->leftJoin('car_models', 'car_package.model_id', '=', 'car_models.id')
            ->leftJoin('car_model_to_brands', 'car_model_to_brands.model_id', '=', 'car_models.id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->where('car_models.model_name',$model_name)
            ->where('car_brands.brand_name',$brand_name)
            ->where('engine_to_package.id',$engine_id)
            ->orderBy('products_category.order')
            ->groupBy('products_category.id');
    }

    public function scopeCategoryForCarsByPackage($query, $brand_name, $model_name, $package_id)
    {
        return $query
            ->selectRaw('engine_to_package.engine,products_category.category_name,products_category.picture_name, products_category.id,engine_to_package.id as engine_id,engine_to_package.package_id')
            ->leftJoin('cars_to_products', 'cars_to_products.product_id', '=', 'category_to_products.product_id')
            ->leftJoin('engine_to_package', 'cars_to_products.engine_id', '=', 'engine_to_package.id')
            ->leftJoin('products_category', 'products_category.id', '=', 'category_to_products.category_id')
            ->leftJoin('car_package', 'car_package.id', '=', 'engine_to_package.package_id')
            ->leftJoin('car_models', 'car_package.model_id', '=', 'car_models.id')
            ->leftJoin('car_model_to_brands', 'car_model_to_brands.model_id', '=', 'car_models.id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->where('car_models.model_name',$model_name)
            ->where('car_brands.brand_name',$brand_name)
            ->where('engine_to_package.package_id',$package_id)
            ->orderBy('products_category.order')
            ->groupBy('products_category.id');

    }


    public function getUriAttribute(){
        if(request()->route()->hasParameter('package')){
            $engine_data = request()->route()->parameter('package').'-'.$this->attributes['engine_id'];
        }else{
            $engine_data = $this->attributes['package_id'];
        }
        return url(request()->route()->parameter("brand").'/'.request()->route()->parameter("model").'/'.$engine_data.'/'.$this->translit($this->attributes['category_name']).'_'.$this->attributes['id']);
    }
}
