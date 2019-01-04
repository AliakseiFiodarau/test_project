<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class ReviewWidget extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Review::count();
        $string = 'Reviews';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-star-half',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} reviews in your database. Click on button below to view all reviews.",
            'button' => [
                'text' => 'View all reviews',
                'link' => route('voyager.reviews.index'),
            ],
            'image' => 'storage/misc/reviews-ratings-stars-ss-1920 (1).jpg',
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Page'));
    }
}
