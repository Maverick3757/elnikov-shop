<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Car_package;
use App\Category_to_products;
use App\Engine_to_package;
use App\Car_brands;
use App\Cars_to_products;
use App\Products;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();


        Route::bind('group_id',function ($value) {
            $brand_name =  request()->route()->parameter("brand");
            $model_name =  request()->route()->parameter("model");
            $engine_data = explode('-',request()->route()->parameter("engine"));
            if(count($engine_data)>1){
                $data = Cars_to_products::productsbyCars($brand_name, $model_name,$engine_data[1],$value)->get();
            }else{
                $data = Cars_to_products::productsbyPackage($brand_name, $model_name,$engine_data[0],$value)->get();
            }
            if($data[0]->translitCategory!==request()->route()->parameter("group_name")){
                return abort(404);
            }elseif (count($data)>0){
                return $data;
            }else{
                return abort(404);
            }
        });

        Route::bind('model_name',function ($value) {
            $brand_name =  request()->route()->parameter("brand");
            $data = Car_package::modelYearsAndPackages($brand_name,$value)->get();
            return count($data)>0?$data:abort(404);

        });

        Route::bind('product_id',function ($product_id) {
            $package_arr = explode('-',request()->route()->parameter("package"));
            $package_id = $package_arr[0];
            $category_id = request()->route()->parameter("category_id");
            return Products::productFullInfo($package_id, $product_id, $category_id)->firstOrFail();
        });

         Route::bind('package_id',function ($value) {
             $brand_name =  request()->route()->parameter("brand");
             $model_name =  request()->route()->parameter("model");
             $data = Category_to_products::CategoryForCarsByPackage($brand_name,$model_name,$value)->get();
             return count($data)>0?$data:abort(404);

         });

        Route::bind('engine_id',function ($value) {
            $brand_name =  request()->route()->parameter("brand");
            $model_name =  request()->route()->parameter("model");
            $data = Category_to_products::CategoryForCars($brand_name,$model_name,$value)->get();
            return count($data)>0?$data:abort(404);

        });
        Route::bind('brand_name',function ($value) {
            return Car_brands::ModelsByBrandName($value)
                ->first() ?? abort(404);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
