<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Type;

class deliveryController extends Controller
{
    public function show ()
    {
        $brands = Brand::all();
        $types = Type::all();
             return view('delivery')->with([
            'brands'=>$brands,
            'types'=>$types,
        ]);
    }
};