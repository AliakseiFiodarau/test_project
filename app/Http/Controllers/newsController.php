<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use App\News;
use App\News_Comment;
use Auth;


class newsController extends Controller
{
    public function show($id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $signInBar = 'layouts\signInBar\guest';
        if (Auth::user()) {
            $signInBar = 'layouts\signInBar\Authenticated';
        }
        $news = News::where('id', $id)
            ->firstOrFail();
        $comments = News_Comment::with('user')
            ->where('news_id', $id)
            ->get();

        return view('news')->with([
            'brands' => $brands,
            'types' => $types,
            'news' => $news,
            'comments' => $comments,
            'signInBar' => $signInBar,
        ]);
    }


    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);

        $user = Auth::user();
        $data = $request->all();
        $comment = new News_Comment([
            'news_id' => $id,
            'text' => $data['text'],
            'author_id' => $user->id
        ]);
        $comment->save();

        return back();
    }
}
