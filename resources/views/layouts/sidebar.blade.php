@section('sidebar')
    <div class="side_menu">
        <div class="side_menu_brands"><span>b</span>rands:</div>
            @foreach($brands as $brand)
                <a href="{{url('brand', $brand->brand_name)}}">
                    {{$brand->brand_name}}
                </a>
            @endforeach
        <div class="side_menu_brands"><span>t</span>ypes:</div>
            @foreach($types as $type)
                <a href="{{url('type', $type->type)}}">
                    {{$type->type}}
                </a>
            @endforeach
    </div>
@endsection