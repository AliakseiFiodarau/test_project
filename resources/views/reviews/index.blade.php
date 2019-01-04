@extends ('layouts.layout')
@section('content')
    <div class="text">
        <div class="inner_block_name">
            REVIEWS
        </div>
        <div class="newest">
            @foreach ($reviews as $review)
                <a href="{{url('reviews',$review->review_id)}}">
                    <div class="text_block">
                        <img src="{{asset('storage/'.$review->bicycle->image)}}" class="text_image">
                        <div class="text_preview">
                            <h1> {{$review->review_name}} </h1>
                            <p>{{mb_substr($review->review_text,
                            0,
                            250,
                            'utf-8')}}...
                            </p>
                            <h2>{{mb_substr($review->pubdate,
                            0,
                            10,
                            'utf-8')}}
                                Author: {{$review->user->name}}
                            </h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="page_numbers">
            {{$reviews -> links('vendor.pagination.default')}}
        </div>
    </div>
@endsection
