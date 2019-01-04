@extends('layouts.layout')
@section('content')
    <div class="article">
        @if($news->first()->image != 'images/newss/default_news_image.png')
            <img src="{{asset('storage/'.$news->first()->image)}}">
        @endif
        <br>
        <h1>{{$news->first()->name}}</h1>
        <br>
        <div class="article_text">
            {{$news->first()->text}}
        </div>
        <div class="pubdate">
            {{mb_substr($news->first()->pubdate,0,10, 'utf-8')}}
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
                    <input type="hidden" name="id" value="{{$news->first()->id}}">
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