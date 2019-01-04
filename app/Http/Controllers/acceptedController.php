<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Type;
use App\Bicycle;
use Illuminate\Http\Request;

class acceptedController extends Controller
{
    public function show($id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $item = Bicycle::find($id);

        return view('accepted')->with([
            'brands' => $brands,
            'types' => $types,
            'item' =>$item
        ]);
    }
}
