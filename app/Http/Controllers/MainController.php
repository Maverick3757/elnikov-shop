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
    public function product($brand_name,$model_name,$product_name,$product_data,$category_id,$package_id)
    {
        //dump($product_data);
        //dump($category_id);
        //dump($package_id);
        $visible_block = array('breadcrumbs');
        return view('welcome', [
            'cars' => $product_data,
            'content'=>'product',
            'css'=>'product',
            'visible_block'=>$visible_block]
        );
    }
    public function test($brand_name,$model_data)
    {
        $visible_block = array('breadcrumbs','side_menu');
        return view('welcome', [
            'cars' => $model_data,
            'content'=>'cars_engine',
            'css'=>'package_choose',
            'visible_block'=>$visible_block]
        );
    }
    public function test2($brand_data)
    {
        $visible_block = array('breadcrumbs','side_menu');
        return view('welcome', [
            'cars' => $brand_data,
            'content'=>'cars_models',
            'css'=>'model_choose',
            'visible_block'=>$visible_block]
        );
    }

    public function test3ByPack($brand_name, $model_name, $categories_data)
    {

        $visible_block = array('breadcrumbs','side_menu');
        return view('welcome', [
            'cars' => $categories_data,
            'content'=>'cars_category',
            'css'=>'category_choose',
            'visible_block'=>$visible_block]
        );
    }

    public function test3($brand_name, $model_name,$i, $categories_data)
    {
        $visible_block = array('breadcrumbs','side_menu');
        return view('welcome', [
            'cars' => $categories_data,
            'content'=>'cars_category',
            'css'=>'category_choose',
            'visible_block'=>$visible_block]
        );
    }
    public function test4($brand_name, $model_name, $engine_id,$categories_name,$products)
    {
        $visible_block = array('breadcrumbs','side_menu');
       return view('welcome', [
           'products' => $products,
           'content'=>'product_list',
           'css'=>'product_list',
           'visible_block'=>$visible_block]
       );
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
        $visible_block = array('side_menu');
        $car_models = car_brands::modelsWithBrands()->get();
        return view('welcome', [
            'cars' => $car_models,
            'content'=>'cars_block',
            'css'=>'main',
            'visible_block'=>$visible_block]
        );
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
