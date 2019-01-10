@extends ('layouts.layout')
@section('content')
    <div class="text">
        <div class="inner_block_name">
            ARTICLES
        </div>
        <div class="newest">
            @foreach ($articles as $article)
                <a href="{{url('articles',$article->article_id)}}">
                    <div class="text_block">
                        <img src="{{asset('storage/'.$article->image)}}" class="text_image">
                        <div class="text_preview">
                            <h1> {{$article->article_name}} </h1>
                            <p>{{mb_substr($article->article_text,
                            0,
                            228,
                            'utf-8')}}...
                            </p>
                            <h2>{{mb_substr($article->pubdate,
                            0,
                            10,
                            'utf-8')}}
                                Author: {{$article->user->name}}
                            </h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="page_numbers">
            {{$articles -> links('vendor.pagination.default')}}
        </div>
        <div class="being_spider_jerusalem">
            Can I write my own article? <a href="{{url('articles/create')}}">Sure!</a>
        </div>
    </div>
@endsection
