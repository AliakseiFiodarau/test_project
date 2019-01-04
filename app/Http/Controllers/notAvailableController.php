<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class notAvailableController extends Controller
{
    public function show(Request $request)
    {
        $brands = Brand::all();
        $types = Type::all();

        return view('not_available')->with([
            'brands' => $brands,
            'types' => $types,
        ]);
    }
}
