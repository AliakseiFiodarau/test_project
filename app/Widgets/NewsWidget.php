<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class NewsWidget extends BaseDimmer
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
        $count = \App\News::count();
        $string = 'News';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-world',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} news in your database. Click on button below to view all news.",
            'button' => [
                'text' => 'View all news',
                'link' => route('voyager.news.index'),
            ],
            'image' => 'storage/misc/8e3e848cbd24bdb85a7c97869ec77386.1451995352.jpg',
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
