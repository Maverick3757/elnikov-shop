<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use App\car_brands;
use App\Car_package;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function ajax(Request $request)
    {
        $data= $request->term+2;
        $html['data'] = View::make('test', ['data' => $data])->render();
        return response()->json($html);
    }

    public function test($brand_name,$model_data)
    {
        return view('welcome', ['cars' => $model_data, 'content'=>'cars_engine','css'=>'package_choose']);
    }
    public function test2($brand_data)
    {
        return view('welcome', ['cars' => $brand_data, 'content'=>'cars_models','css'=>'model_choose']);
    }

    public function test3ByPack($brand_name, $model_name, $categories_data)
    {
        return view('welcome', ['cars' => $categories_data, 'content'=>'cars_category','css'=>'category_choose']);
    }

    public function test3($brand_name, $model_name,$i, $categories_data)
    {
        return view('welcome', ['cars' => $categories_data, 'content'=>'cars_category','css'=>'category_choose']);
    }
    public function test4($brand_name, $model_name, $engine_id,$categories_name,$products)
    {
       return view('welcome', ['products' => $products, 'content'=>'product_list','css'=>'product_list']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $car_models = car_brands::modelsWithBrands()->get();
        return view('welcome', ['cars' => $car_models,'content'=>'cars_block','css'=>'main']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
