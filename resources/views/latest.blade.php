@extends ('layouts.layout')
@section('content')
    <div class="text" xmlns="http://www.w3.org/1999/html">
        <div class="inner_block_name">
            LATEST
        </div>
        @foreach ($latest as $value)
            @if($value->status == 'PUBLISHED')
                <a href="{{url($value->category,+ $value->latest_id)}}">
                    <div class="text_block">
                        @if($value->category == 'articles')
                            <img src="{{asset('storage/'.$articles
                                ->where('article_id', $value->latest_id)
                                ->first()
                                ->image)}}"
                                 class="text_image">
                            <div class="text_preview">
                                <h1> {{$articles
                                    ->where('article_id', $value->latest_id)
                                    ->first()
                                    ->article_name}} </h1>
                                <p>{{mb_substr($articles
                                    ->where('article_id', $value->latest_id)
                                    ->first()
                                    ->article_text,
                                    0,
                                    250,
                                    'utf-8')}}
                                <h2>{{mb_substr($value->created_at,
                                    0,
                                    10,
                                    'utf-8')}}
                                    Author:
                                    {{$articles
                                    ->where('article_id', $value->latest_id)
                                    ->first()
                                    ->user
                                    ->name}}
                                </h2>
                            </div>
                        @elseif($value->category == 'reviews')
                            <img src="{{asset('storage/'.$reviews
                                ->where('review_id', $value->latest_id)
                                ->first()
                                ->bicycle
                                ->image)}}"
                                 class="text_image">
                            <div class="text_preview">
                                <h1> {{$reviews
                                    ->where('review_id', $value->latest_id)
                                    ->first()
                                    ->review_name}} </h1>
                                <p>{{mb_substr($reviews
                                    ->where('review_id', $value->latest_id)
                                    ->first()
                                    ->review_text,
                                    0,
                                    250,
                                    'utf-8')}}
                                <h2>{{mb_substr($value->created_at,
                                    0,
                                    10,
                                    'utf-8')}}
                                    Author:
                                    {{$reviews
                                    ->where('review_id', $value->latest_id)
                                    ->first()
                                    ->user
                                    ->name}}
                                </h2>
                            </div>
                        @elseif($value->category == 'news')
                            <img src="{{asset('storage/'.$news
                                ->where('id', $value->latest_id)
                                ->first()
                                ->image)}}"
                                 class="text_image">
                            <div class="text_preview">
                                <h1> {{$news
                                    ->where('id', $value->latest_id)
                                    ->first()
                                    ->name}} </h1>
                                <p>{{mb_substr($news
                                    ->where('id', $value->latest_id)
                                    ->first()
                                    ->text,
                                    0,
                                    250,
                                    'utf-8')}}
                                <h2>{{mb_substr($value->created_at,
                                    0,
                                    10,
                                    'utf-8')}}
                                </h2>
                            </div>
                        @elseif($value->category == 'items')
                            <img src="{{asset('storage/'.$items
                                ->where('id', $value->latest_id)
                                ->first()
                                ->image)}}"
                                 class="text_image">
                            <div class="text_preview">
                                <h1> {{$items
                                    ->where('id', $value->latest_id)
                                    ->first()
                                    ->brand
                                    ->brand_name}} </h1>
                                <p>{{mb_substr($items
                                    ->where('id', $value->latest_id)
                                    ->first()
                                    ->model,
                                    0,
                                    250,
                                    'utf-8')}}
                                <h2>{{mb_substr($value->created_at,
                                    0,
                                    10,
                                    'utf-8')}}
                                </h2>
                            </div>
                        @endif
                    </div>
                </a>
            @endif
        @endforeach
        <div class="page_numbers">
            {{$latest -> links('vendor.pagination.default')}}
        </div>
    </div>
@endsection


