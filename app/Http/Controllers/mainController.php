<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bicycle;
use App\Brand;
use App\Type;
use App\Article;
use App\Review;
use Auth;

class mainController extends Controller
{
    public function show ()
    {
        $brands = Brand::all();
        $types = Type::all();
        $signInBar = 'layouts\signInBar\guest';
        if(Auth::user()){
            $signInBar = 'layouts\signInBar\Authenticated';
        }
        $bicycles = Bicycle::with('brand')
            ->orderBy('appear_date', 'desc')
            ->limit('8')
            ->get();
        $articles = Article::with('user')
            ->where('status', 'published')
            ->orderBy('pubdate', 'desc')
            ->limit('4')
            ->get();
        $reviews = Review::with('bicycle')
            ->where('status', 'published')
            ->orderBy('pubdate', 'desc')
            ->limit('4')
            ->get();

        return view('main')->with([
            'brands'=>$brands,
            'types'=>$types,
            'bicycles'=>$bicycles,
            'articles'=>$articles,
            'reviews'=>$reviews,
            'signInBar'=>$signInBar
        ]);
    }
};