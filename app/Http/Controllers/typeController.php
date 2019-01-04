<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bicycle;
use App\Brand;
use App\Type;
use Auth;

class typeController extends Controller
{
    public function index(Request $request, $type)
    {
        $brands = Brand::all();
        $types = Type::all();
        $routeName = 'type/' . $type;
        $brandTypeName = $type;
        $thisType = Type::where('type', $type)->first()->type_id;
        $items = Bicycle::with('type')
            ->where('type_id', $thisType)
            ->paginate(12);

        return view('brandType')->with([
            'brands' => $brands,
            'types' => $types,
            'items' => $items,
            'routeName' => $routeName,
            'brandTypeName' => $brandTypeName
        ]);
    }
}
