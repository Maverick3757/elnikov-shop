<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Engine_to_package extends Model
{
    public $timestamps = false;
    protected $table = 'engine_to_package';

    public function car_package()
    {
        return $this->hasMany('App\Engine_to_package','package_id','id');
    }



}
