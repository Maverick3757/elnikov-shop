<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Car_package extends Model
{
    protected $table = 'car_package';
    public $timestamps = false;

    public function engine_to_package()
    {
        return $this->belongsToMany('App\Engine_to_package','car_package','id','id','id','package_id');

    }

    public function scopeModelYearsAndPackages($query, $brand_name, $model_name)
    {
        return $query
            ->selectRaw('tbl.engine, tbl.engine_id,car_package.picture_name,`car_models`.`model_name`,car_models.picture_name as model_pic,car_models.meta_keywords,car_models.meta_description,car_models.id, car_package.build_years,car_package.id as package_id')
            ->leftJoin('car_models', 'car_package.model_id', '=', 'car_models.id')
            ->leftJoin(
                DB::raw('(SELECT GROUP_CONCAT(engine SEPARATOR "||") as engine, package_id, GROUP_CONCAT(id) as engine_id FROM engine_to_package GROUP BY package_id) tbl'), function($join)
            {
                $join->on('tbl.package_id', '=', 'car_package.id');
            })
            ->leftJoin('car_model_to_brands', 'car_model_to_brands.model_id', '=', 'car_models.id')
            ->leftJoin('car_brands', 'car_brands.id', '=', 'car_model_to_brands.brand_id')
            ->where('car_models.model_name',$model_name)
            ->where('car_brands.brand_name',$brand_name)
            ->groupBy('car_package.id');
    }
    public function getEngines($string_years){
        return explode('||',$string_years);
    }
    public function getEnginesId($string_ids){
        return explode(',',$string_ids);
    }

    public function getEngineUrlAttribute($engine_id){
        return url('/'.request()->route()->parameter("brand").'/'.$this->attributes['model_name'],['model_id'=>$engine_id]);
    }

}
