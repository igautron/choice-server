<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    	// Product::factory(10)->create();

    	return [
    		'status' => 'ok',
    		'products' => Product::all(),
    	];
    }

    public function filter(Request $request)
    {
        //test
        // dd($request->has('types'));
        if ($request->has('filter')) {
            $json = $request->get('filter');
            $filter_values = json_decode($json, true);

            $product = Product::where('id','>',1);

            if (isset($filter_values['subtype'])) {
                $filter_subtype = $filter_values['subtype'];
                $product->where(function($q) use ($filter_subtype){
                    foreach ($filter_subtype as $type => $one) {
                        $q->orWhere('subtype', $type);
                    }
                });
            }

            if (isset($filter_values['apps'])) {
                $filter_apps = $filter_values['apps'];
                $product->where(function($q) use ($filter_brands){
                    foreach ($filter_apps as $app => $one) {
                        $q->orWhere('app', $a);
                    }
                });
            }

            if (isset($filter_values['brands'])) {
                $filter_brands = $filter_values['brands'];
                $product->where(function($q) use ($filter_brands){
                    foreach ($filter_brands as $brand => $one) {
                        $q->orWhere('brand', $brand);
                    }
                });
            }

            if (isset($filter_values['serias'])) {
                $filter_serias = $filter_values['serias'];
                $product->where(function($q) use ($filter_seria){
                    foreach ($filter_seria as $seria => $one) {
                        $q->orWhere('seria', $seria);
                    }
                });
            }

            if (isset($filter_values['gender'])) {
                $filter_gender = $filter_values['gender'];
                $product->where(function($q) use ($filter_gender){
                    foreach ($filter_gender as $gender => $one) {
                        $q->orWhere($gender, 1);
                    }
                });
            }

            if (isset($filter_values['gender'])) {
                $filter_gender = $filter_values['gender'];
                $product->where('gender', $filter_gender);
            }

            if ($filter_values['price']) {
                if (isset($filter_values['price']['min'])) {
                    $product->where('price', '>',(int)$filter_values['price']['min']);
                }
                if (isset($filter_values['price']['max'])) {
                    $product->where('price', '<',(int)$filter_values['price']['max']);
                }
            }

            $products = $product->offset(0)->limit(30)->get();
            // dd($products);
            return[
                'filter_values' => $filter_values,
                'products' => $products,
                'count' => count($products),
                // '$filter_subtype' => $filter_subtype,
            ];
        }
        return[
            'filter_values' => 'no values',
            'products' => [],
            'count' => 0,
        ];
    }

    public function show($id)
    {
    	if ($product = Product::find($id)) {
            return [
                'status' => 'ok',
                'data' => $product,
            ];
        }else{
            return [
                'status' => 'error',
                'data' => [],
            ];
        }
    }
}
