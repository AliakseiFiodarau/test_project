@extends('layouts.layout')
@section('content')
    <div class="article">
        <div class="inner_block_name">
            <a href="{{url('items', $review->bicycle->id)}}">
            {{$brand->first()->brand_name}}
            {{$review->bicycle->model}}
            </a>
        </div>
        <img src="{{asset('storage/'.$review->bicycle->image)}}">
        <br>
        <h1>{{$review->review_name}}</h1>
        <br>
        <div class="article_text">
            {{$review->review_text}}
        </div>
        <div class="pubdate">
            {{mb_substr($review->pubdate,0,10, 'utf-8')}}
        </div>

        <div class="author">
            <div><img src="{{asset('storage/'.$review->user->avatar)}}"></div>
            <div><h2>{{$review->user->name}}</h2></div>
        </div>

        <div class="rating_grid">
            @if (Auth::user() && !$liked)
                <div id="like_button" class="like">
                    <a href="{{url(Request::path(),'like')}}">
                        <img src="{{asset('images/misc/bab24ebe.png')}}" class="like_img">
                    </a>
                </div>
                <div id="dislike_button" class="like">
                    <a href="{{url(Request::path(),'dislike')}}">
                        <img src="{{asset('images/misc/arrow-down-icon-png-22.png')}}" class="like_img">
                    </a>
                </div>
            @endif
            <div class="heart"><img src="{{asset('images/misc/Like.png')}}" class="eye_img"></div>
            <div class="eye"><img src="{{asset('images/misc/1_Gy_8vdAQJ69RbvCnG_xRTw.png')}}" class="eye_img"></div>
            <div class="rating">{{$review->rating}}</div>
            <div class="views">{{$review->views}}</div>
        </div>

        <div class="comments">
            @if (count($comments)<1)
                <div class="being_spider_jerusalem">No one has left any comments yet</div>
            @else
                @foreach($comments as $comment)
                    <div class="comment">
                        <div>
                            <img src="{{asset('storage/'.$comment->user->avatar)}}">
                        </div>
                        <div class="comment_text">
                            <h2>{{$comment->user->name}}</h2>
                            {{$comment->text}}
                            <h3>{{$comment->created_at}}</h3>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(Auth::user())
                <div class="comment">
                    <div>
                        <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="user's portrait">
                    </div>
                    {!! Form::open() !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$review->id}}">
                    <div class="comment_text">
                        <h2>{{Auth::user()->name}}</h2>
                    </div>
                    <div class="form-group">
                        {!! Form::label('text', ' ') !!}
                        {!! Form::textarea('text', null, ['class'=>'form-control', 'cols'=>90]) !!}
                    </div>
                    <div>
                        {!! Form::submit('comment', ['class'=>'change']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            @else
                <div class="being_spider_jerusalem">
                    To leave comments you must <a href="{{url('login')}}">login</a> or <a href="{{url('register')}}">register</a>
                </div>
            @endif
        </div>
    </div>
@endsection