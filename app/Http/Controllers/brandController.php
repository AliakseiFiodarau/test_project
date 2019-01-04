<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bicycle;
use App\Brand;
use App\Type;
use Auth;

class brandController extends Controller
{
    public function index(Request $request, $brandName)
    {
        $brands = Brand::all();
        $types = Type::all();
        $brandTypeName = $brandName;
        $thisBrand = Brand::where('brand_name', $brandName)->first()->brand_id;
        $items = Bicycle::with('brand')
            ->where('brand_id', $thisBrand)
            ->paginate(12);
        
        return view('brandType')->with([
            'brands' => $brands,
            'types' => $types,
            'items' => $items,
            'brandTypeName' => $brandTypeName,
        ]);
    }
}
