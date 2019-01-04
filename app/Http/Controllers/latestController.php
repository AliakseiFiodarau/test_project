<?php

namespace App\Http\Controllers;

use App\Article;
use App\Review;
use App\Bicycle;
use App\News;
use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use App\Latest;
use Auth;

class latestController extends Controller
{
    public function show($page = 1, Request $request)
    {
        $brands = Brand::all();
        $types = Type::all();
        $articles = Article::with('user')
            ->get();
        $reviews = Review::with('user', 'bicycle')
            ->get();
        $news = News::all();
        $items = Bicycle::all();
        $latest = Latest::where('status', 'PUBLISHED')
        ->paginate(8);

        return view('latest')->with([
            'brands' => $brands,
            'types' => $types,
            'articles' => $articles,
            'reviews' => $reviews,
            'news' => $news,
            'items' => $items,
            'latest' => $latest,
        ]);
    }
}
