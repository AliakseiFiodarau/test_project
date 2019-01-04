<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class OrderWidget extends BaseDimmer
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
        $incomplete = \App\Order::where('status', 'incomplete')
            ->get();
        $count = count($incomplete);
        $string = 'Orders';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-basket',
            'title' => "{$count} {$string}",
            'text' => "You have {$count} incompleted orders in your database. Click on button below to view all orders.",
            'button' => [
                'text' => 'View all orders',
                'link' => route('voyager.orders.index'),
            ],
            'image' => 'storage/misc/online-shopping.jpg',
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
