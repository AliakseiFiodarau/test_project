<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use Auth;

class aboutController extends Controller
{
    public function show(){
        $brands = Brand::all();
        $types = Type::all();
        if(Auth::user()){
            $signInBar = 'layouts\signInBar\Authenticated';
        }
        $signInBar = 'layouts\signInBar\guest';


        return view('about')->with([
            'brands'=>$brands,
            'types'=>$types,
            'signInBar'=>$signInBar
            ]);
    }
}
