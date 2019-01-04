<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';
    protected $fillable = [
        'article_name',
        'article_text',
        'image',
        'author_id',
        'rating',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Article_Comment', 'article_id', 'article_id');
    }

    public function comment(Request $request, $id)
    {
        $user = Auth::user();
        $data = $request->all();
        $comment = new Article_Comment([
            'article_id' => $id,
            'text' => $data['text'],
            'author_id' => $user->id
        ]);
        return $comment->save();
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
        }
            return $like->save();
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
}
