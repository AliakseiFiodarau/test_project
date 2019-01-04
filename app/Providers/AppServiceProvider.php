<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
use App\Bicycle;
use App\Review;
use App\Latest;
use App\News;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        News::created(function (News $news) {
            $latest = Latest::create([
                'latest_id' => $news->id,
                'category' => 'news'
            ]);
        });

        News::updated(function (News $news) {
            $latest = Latest::where('latest_id', $news->id)
                ->update([
                    'status' => $news->status,
                ]);
        });

        News::deleted(function (News $news) {
            $latest = Latest::where('latest_id', $news->id)
                ->delete();
        });

        Article::created(function (Article $article) {
            $latest = Latest::create([
                'latest_id' => $article->article_id,
                'status' => 'DRAFT',
                'category' => 'articles'
            ]);
        });

        Article::updated(function (Article $article) {
            $latest = Latest::where('latest_id', $article->article_id)
                ->update([
                    'status' => $article->status,
                ]);
        });

        Article::deleted(function (Article $article) {
            $latest = Latest::where('latest_id', $article->article_id)
                ->delete();
        });

        Review::created(function (Review $review) {
            $latest = Latest::create([
                'latest_id' => $review->review_id,
                'category' => 'reviews'
            ]);
        });

        Review::updated(function (Review $review) {
            $latest = Latest::where('latest_id', $review->review_id)
                ->update([
                    'status' => $review->status,
                ]);
        });

        Review::deleted(function (Review $review) {
            $latest = Latest::where('latest_id', $review->review_id)
                ->delete();
        });

        Bicycle::created(function (Bicycle $bicycle) {
            $latest = Latest::create([
                'latest_id' => $bicycle->id,
                'category' => 'items'
            ]);
        });

        Bicycle::updated(function (Bicycle $bicycle) {
            $latest = Latest::where('latest_id', $bicycle->id)
                ->update([
                ]);
        });

        Bicycle::deleted(function (Bicycle $bicycle) {
            $latest = Latest::where('latest_id', $bicycle->id)
                ->delete();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
