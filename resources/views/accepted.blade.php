@extends('layouts.layout')
@section('sidebar')
@endsection
@section('content')
    <div class="accepted">
        Your order ({{$item->brand->brand_name.' '.$item->model}}) is accepted. Our evil elves will contact you soon.
    </div>
@endsection