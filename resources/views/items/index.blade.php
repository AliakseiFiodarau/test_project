@extends ('layouts.layout')
@section('content')
    <div class="text">
        <div class="inner_block_name">
            SHOP
        </div>
        <div class="newest">
            @foreach ($items as $item)
                <a href="{{url('items',$item->id)}}">
                    <div class="newest_block">
                        <div><img src="{{asset('storage/'.$item->image)}}"></div>
                        <div>
                            {{$item->brand->brand_name}}
                            <br>
                            {{$item->model}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="page_numbers">
        {{$items -> links('vendor.pagination.default')}}
        </div>
    </div>
@endsection
