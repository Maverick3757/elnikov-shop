<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cars_to_products extends Model
{
    //
    protected $table = 'cars_to_products';
    public $timestamps = false;

    public function scopeProductsbyCars($query, $brand_name, $model_name,$engine_id,$category_id)
    {
        return $query
            ->selectRaw('`engine_to_package`.`engine`, `car_package`.`build_years`,`car_models`.`model_name`,`car_brands`.`brand_name`,`category_to_products`.`product_id`,  `products_category`.`category_name`,IF(`currencies`.`rateToUAH`<`receives`.`rate`,tbl.`seil_price`*`receives`.`rate`,tbl.`seil_price`*`currencies`.`rateToUAH`) as seil_price,`products`.*,pic.picture_name')
            ->leftJoin('category_to_products', 'category_to_products.product_id', '=', 'cars_to_products.product_id')
            ->leftJoin('engine_to_package', 'engine_to_package.id', '=', 'cars_to_products.engine_id')
            ->leftJoin('car_package', 'car_package.id', '=', 'engine_to_package.package_id')
            ->leftJoin('car_models', 'car_package.model_id', '=', 'car_models.id')
            ->leftJoin('car_model_to_brands', 'car_model_to_brands.model_id', '=', 'car_models.id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->leftJoin('products_category', 'products_category.id', '=', 'category_to_products.category_id')
            ->leftJoin('products', 'cars_to_products.product_id', '=', 'products.id')
            ->leftJoin(
                DB::raw('(SELECT `receive_id`, `product_id`,`price`,`seil_price` FROM `products_to_receives` WHERE `receive_id` = (SELECT MAX(`receive_id`) FROM `products_to_receives` as p WHERE p.`product_id` = `products_to_receives`.`product_id`))tbl'), function($join)
            {
                $join->on('tbl.product_id', '=', 'products.id');
            })
            ->leftJoin('receives', 'receives.id', '=', 'tbl.receive_id')
            ->leftJoin('currencies', 'receives.currency_id', '=', 'currencies.id')
            ->leftJoin(
                DB::raw('(SELECT `picture_name`,`product_id` FROM `picture_to_products` WHERE `ordering` = (SELECT MIN(`ordering`) FROM `picture_to_products` as p WHERE p.`product_id` = `picture_to_products`.`product_id`))pic'), function($join)
            {
                $join->on('pic.product_id', '=', 'products.id');
            })

            ->where('car_models.model_name',$model_name)
            ->where('car_brands.brand_name',$brand_name)
            ->where('engine_to_package.id',$engine_id)
            ->where('category_to_products.category_id',$category_id);
    }

    public function scopeProductsbyPackage($query, $brand_name, $model_name,$package_id,$category_id)
    {
        return $query
            ->selectRaw('`engine_to_package`.`engine`, `car_package`.`build_years`,`car_models`.`model_name`,`car_brands`.`brand_name`,`category_to_products`.`product_id`,  `products_category`.`category_name`,IF(`currencies`.`rateToUAH`<`receives`.`rate`,tbl.`seil_price`*`receives`.`rate`,tbl.`seil_price`*`currencies`.`rateToUAH`) as seil_price,`products`.*,pic.picture_name')
            ->leftJoin('category_to_products', 'category_to_products.product_id', '=', 'cars_to_products.product_id')
            ->leftJoin('engine_to_package', 'engine_to_package.id', '=', 'cars_to_products.engine_id')
            ->leftJoin('car_package', 'car_package.id', '=', 'engine_to_package.package_id')
            ->leftJoin('car_models', 'car_package.model_id', '=', 'car_models.id')
            ->leftJoin('car_model_to_brands', 'car_model_to_brands.model_id', '=', 'car_models.id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->leftJoin('products_category', 'products_category.id', '=', 'category_to_products.category_id')
            ->leftJoin('products', 'cars_to_products.product_id', '=', 'products.id')
            ->leftJoin(
                DB::raw('(SELECT `receive_id`, `product_id`,`price`,`seil_price` FROM `products_to_receives` WHERE `receive_id` = (SELECT MAX(`receive_id`) FROM `products_to_receives` as p WHERE p.`product_id` = `products_to_receives`.`product_id`))tbl'), function($join)
            {
                $join->on('tbl.product_id', '=', 'products.id');
            })
            ->leftJoin('receives', 'receives.id', '=', 'tbl.receive_id')
            ->leftJoin('currencies', 'receives.currency_id', '=', 'currencies.id')
            ->leftJoin(
                DB::raw('(SELECT `picture_name`,`product_id` FROM `picture_to_products` WHERE `ordering` = (SELECT MIN(`ordering`) FROM `picture_to_products` as p WHERE p.`product_id` = `picture_to_products`.`product_id`))pic'), function($join)
            {
                $join->on('pic.product_id', '=', 'products.id');
            })

            ->where('car_models.model_name',$model_name)
            ->where('car_brands.brand_name',$brand_name)
            ->where('car_package.id',$package_id)
            ->where('category_to_products.category_id',$category_id)
            ->groupBy('car_package.id');
    }
    public function getTranslitCategoryAttribute(){
        return $this->translit($this->attributes['category_name']);
    }

    public function getCarModelAttribute(){
        return $this->attributes['brand_name'].' '.$this->attributes['model_name'].' ('.$this->attributes['build_years'].')';
    }
    public function getProductUriAttribute(){
        return $this->translit($this->attributes['product_name']);
    }

    public function getProductNameAttribute(){
        return $this->attributes['product_name'].' ('.$this->attributes['info'].') '.$this->attributes['brand_name'].' '.$this->attributes['model_name'].' '.$this->attributes['providers_artikul'];
    }

    public function getProductPriceAttribute(){
        return number_format(ceil($this->attributes['seil_price']/5)*5,2);
    }
}
