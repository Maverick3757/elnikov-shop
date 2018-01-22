<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_category extends Model
{
    //
    protected $table = 'products_category';
    public $timestamps = false;

    public function getUriAttribute(){
        return url('/category/'.$this->translit($this->attributes['category_name']).'_'.$this->attributes['id']);
    }
}
