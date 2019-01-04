@extends('layouts.layout')
@section('content')
    <div class="item">
        <div class="inner_block_name">
            {{$item->brand->brand_name}}
            <br>
            {{$item->model}}
        </div>
        <img class="item_image" src="{{asset('storage/'.$item->image)}}">

        <table>
            <tr>
                <td>price</td>
                <td>{{$item->price}}</td>
            </tr>
            <tr>
                <td>year</td>
                <td>{{$item->year}}</td>
            </tr>
            <tr>
                <td>type</td>
                <td>{{$item->type->type}}</td>
            </tr>
            <tr>
                <td>frame material</td>
                <td>{{$item->frame_material}}</td>
            </tr>
            <tr>
                <td>fork</td>
                <td>{{$item->fork}}</td>
            </tr>
            <tr>
                <td>rear suspension</td>
                <td>
                    @if ($item->rear_suspension=='null' or !$item->rear_suspension)
                        -
                    @else {{$item->rear_suspension}}
                    @endif</td>
            </tr>
            <tr>
                <td>front derailleur</td>
                <td>
                    @if ($item->front_derailleur=='null' or !$item->front_derailleur)
                        -
                    @else {{$item->front_derailleur}}
                    @endif</td>
            </tr>
            <tr>
                <td>rear derailleur</td>
                <td>
                    @if ($item->rear_derailleur=='null' or !$item->rear_derailleur)
                        -
                    @else {{$item->rear_derailleur}}
                    @endif</td>
            </tr>
            <tr>
                <td>crankset rings quantity</td>
                <td>{{$item->front_rings_quantity}}</td>
            </tr>
            <tr>
                <td>cassette sprockets quantity</td>
                <td>{{$item->rear_sprockets_quantity}}</td>
            </tr>
            <tr>
                <td>crankset teeth</td>
                <td>
                    @if ($item->rings_teeth=='null' or !$item->rings_teeth)
                        -
                    @else {{$item->rings_teeth}}
                    @endif</td>
            </tr>
            <tr>
                <td>cassette teeth</td>
                <td>
                    @if ($item->sprockets_teeth=='null' or !$item->sprockets_teeth)
                        -
                    @else {{$item->sprockets_teeth}}
                    @endif</td>
            </tr>
            <tr>
                <td>shifters</td>
                <td>
                    @if ($item->shift_levers=='null' or !$item->shift_levers)
                        -
                    @else {{$item->shift_levers}}
                    @endif</td>
            </tr>
            <tr>
                <td>brake system</td>
                <td>
                    @if ($item->brakes=='null' or !$item->brakes)
                        -
                    @else {{$item->brakes}}
                    @endif</td>
            </tr>
            <tr>
                <td>wheel size</td>
                <td>{{$item->wheel_size}}"</td>
            </tr>
            <tr>
                <td>available</td>
                <td>
                    @if($item->available)
                        <img src={{asset('storage/misc/available.png')}} alt="available">
                    @else
                        <img src={{asset('storage/misc/not_available.png')}} alt="available">
                    @endif
                </td>
            </tr>
        </table>

        @if($item->available)
            <div class='buy'>
                <a href="{{url('order', $item->id )}}" class="buy_button" target="_blank">
                    BUY IT
                </a>
            </div>
        @endif

        @foreach ($reviews as $review)
            <a class="review_link"
               href="{{url('reviews', $review->review_id)}}">
                <div class="text_block">
                    <img class="review_author_img" src="{{asset('storage/'.$review->user->avatar)}}">
                    <div class="text_preview">
                        <h1>{{$review->review_name}}</h1>
                        <p>{{mb_substr($review->review_text,
                                0,
                                275,
                                'utf-8').'...' }}</p>
                        <h2>{{mb_substr($review->pubdate,
                                0,
                                10,
                                'utf-8').' Author: '. $review->user->name}}</h2>
                    </div>
                </div>
            </a>
        @endforeach
        <div class="being_spider_jerusalem">
            Can I write a review? <a href="{{url('reviews/create',$item->id)}}">Sure!</a>
        </div>
    </div>
@endsection