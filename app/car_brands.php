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
    public function translit($str) {
        $str = (string) $str; // преобразуем в строковое значение
        $str = strip_tags($str); // убираем HTML-теги
        $str = str_replace(array("\n", "\r"), " ", $str); // убираем перевод каретки
        $str = preg_replace("/\s+/", ' ', $str); // удаляем повторяющие пробелы
        $str = trim($str); // убираем пробелы в начале и конце строки
        $str = function_exists('mb_strtolower') ? mb_strtolower($str, 'UTF-8') : strtolower($str,'UTF-8'); // переводим строку в нижний регистр (иногда надо задать локаль)
        $str = strtr($str, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $str = preg_replace("/[^0-9a-z-_ ]/i", "", $str); // очищаем строку от недопустимых символов
        $str = str_replace(" ", "-", $str); // заменяем пробелы знаком минус
        return $str; // возвращаем результат
    }

}
