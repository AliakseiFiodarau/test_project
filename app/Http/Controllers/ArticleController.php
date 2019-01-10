<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use App\Article;
use App\Article_Comment;
use App\Like;
use Auth;

class ArticleController extends Controller
{
    /**
     * ArticleController constructor.
     */
    public function __construct(){
        $this->middleware('auth')
        ->only('create');
    }

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
        $articles = Article::with('user')
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('articles.index')->with([
            'brands' => $brands,
            'types' => $types,
            'articles' => $articles,
            'routeName' => $routeName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();
        $user = Auth::user();

        return view('articles.create')->with([
            'brands' => $brands,
            'types' => $types,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $path = 'articles/default_article_icon.png';
        if ($request->hasFile('image')) {
            $request->file('image');
            $path = $request->file('image')
                ->store('articles', 'public');
        }
        $article = new Article([
            'article_name' => $data['article_name'],
            'article_text' => $data['article_text'],
            'author_id' => $user->id,
            'image' => $path,
        ]);
        $article->save();

        return redirect('articles');
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
        $signInBar = 'layouts\signInBar\guest';
        if (Auth::user()) {
            $signInBar = 'layouts\signInBar\Authenticated';
        }
        $article = Article::where('article_id', $id)
            ->with('user')
            ->firstOrFail();
        $user = $article
            ->user;
        $comments = Article_Comment::with('user')
            ->where('article_id', $id)
            ->get();
        $views = $article->views;
        Article::where('article_id', $id)
            ->update(['views' => $views + 1]);
        $liked = 0;
        if (Auth::user()) {
            $liked = Like::where('article_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        }

        return view('articles.show')->with([
            'brands' => $brands,
            'types' => $types,
            'article' => $article,
            'user' => $user,
            'comments' => $comments,
            'signInBar' => $signInBar,
            'liked' => $liked
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }

    public function like($id)
    {
        $liked = 0;
        if (Auth::user()) {
            $liked = Like::where('article_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        }
        if (!$liked && Auth::user())
        {
            $newLike = new Like([
                'article_id' => $id,
                'user_id' => Auth::user()->id
            ]);
            $like = Article::find($id);
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
            $liked = Like::where('article_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        }
        if (!$liked && Auth::user()) {
            $newLike = new Like([
                'article_id' => $id,
                'user_id' => Auth::user()->id
            ]);
            $like = Article::find($id);
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
        $comment = new Article_Comment([
            'article_id' => $id,
            'text' => $data['text'],
            'author_id' => $user->id
        ]);
        $comment->save();
        return back();
    }
}
