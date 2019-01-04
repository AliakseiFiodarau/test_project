@extends ('layouts.layout')
@section('content')
    <div class="newest">
        <div class="block_name">
            <h2><a href="{{url('shop')}}"><span>B</span>ICYCLES</a></h2>
        </div>
        @foreach ($bicycles as $bicycle)
            <a href="{{url('items', $bicycle->id)}}">
                <div class="newest_block">
                    <div><img src="{{asset('storage/'.$bicycle->image)}}"></div>
                    <div>
                        {{$bicycle->brand->brand_name}}
                        <br>
                        {{$bicycle->model}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="text">
        <div class="block_name">
            <h2><a href="{{url('articles')}}"><span>A</span>RTICLES</a></h2>
        </div>
        @foreach ($articles as $article)
        <a href="{{url('articles', $article->article_id)}}">
            <div class="text_block">
                <img src="{{asset('storage/'.$article->image)}}" class="text_image">
                <div class="text_preview">
                    <h1> {{$article->article_name}} </h1>
                    <p> {{ mb_substr($article->article_text,
                                0,
                                275,
                                'utf-8').'...'}}</p>
                </div>
            </div>
        </a>
    @endforeach
    </div>

    <div class="text">
        <div class = block_name>
            <h2><a href="{{url('reviews')}}" ><span>R</span>EVIEWS</a></h2>
        </div>
        @foreach ($reviews as $review)
            <a href="{{url('reviews', $review->review_id)}}">
                <div class="text_block">
                    <img src="{{asset('storage/'.$review->bicycle->image)}}" class="text_image">
                    <div class="text_preview">
                        <h1> {{$review->review_name}} </h1>
                        <p> {{ mb_substr($review->review_text,
                                0,
                                275,
                                'utf-8').'...'}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection