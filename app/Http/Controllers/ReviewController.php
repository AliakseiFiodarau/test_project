<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use App\Review;
use App\Bicycle;
use App\Review_Comment;
use App\Like;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $page = 1)
    {
        $brands = Brand::all();
        $types = Type::all();
        $routeName = $request->route()->getName();
        $itemsCount = Review::all()
            ->count();
        $pageNumber = ceil($itemsCount / 8);

        $reviews = Review::with('user', 'bicycle')
            ->where('status', 'PUBLISHED')
            ->paginate(8);

        return view('reviews.index')->with([
            'brands' => $brands,
            'types' => $types,
            'reviews' => $reviews,
            'page' => $page,
            'pageNumber' => $pageNumber,
            'routeName' => $routeName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $user = Auth::user();

        return view('reviews.create')->with([
            'brands' => $brands,
            'types' => $types,
            'user' => $user,
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'review_name' => 'required',
            'review_text' => 'required'
        ]);

        $user = Auth::user();
        $item = Bicycle::where('id', $id);
        $data = $request->all();
        if($request->hasFile('image')){
            $request->file('image');
        }
        $Review = new Review([
            'review_name' => $data['review_name'],
            'review_text' => $data['review_text'],
            'bicycle_id' => $id,
            'author_id' => $user->id
        ]);
        $Review->save();

        return redirect('reviews');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $review = Review::with('user', 'bicycle')
            ->where('review_id', $id)
            ->firstOrFail();
        $user = $review
            ->user;
        $brand = Brand::where('brand_id', $review->first()->bicycle->brand_id)
            ->get();
        $comments = Review_Comment::with('user')
            ->where('review_id', $id)
            ->get();
        $views = $review->views;
        Review::where('review_id', $id)
            ->update(['views' => $views + 1]);
        $liked = 0;
        if (Auth::user()) {
            $liked = Like::where('review_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        }
        return view('reviews.show')->with([
            'brands' => $brands,
            'types' => $types,
            'review' => $review,
            'user' => $user,
            'brand' => $brand,
            'comments' => $comments,
            'liked' => $liked

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function like($id)
    {
        $liked = 0;
        if (Auth::user()) {
            $liked = Like::where('review_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        }
        if (!$liked && Auth::user())
        {
            $newLike = new Like([
                'review_id' => $id,
                'user_id' => Auth::user()->id
            ]);
            $like = Review::find($id);
            $like->rating = $like->rating + 1;
            $newLike->save();
            $like->save();
        }
        return back();
    }

    public function dislike($id)
    {
        $liked = 0;
        if (Auth::user()) {
            $liked = Like::where('review_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        }
        if (!$liked && Auth::user()) {
            $newLike = new Like([
                'review_id' => $id,
                'user_id' => Auth::user()->id
            ]);
            $like = Review::find($id);
            $like->rating = $like->rating - 1;
            $newLike->save();
            $like->save();
        }
        return back();
    }

    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);
        $user = Auth::user();
        $data = $request->all();
        $comment = new Review_Comment([
            'review_id' => $id,
            'text' => $data['text'],
            'author_id' => $user->id
        ]);
        $comment->save();
        return back();
    }
}

