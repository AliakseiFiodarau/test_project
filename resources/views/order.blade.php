@extends('layouts.layout')
@section('sidebar')
@endsection
@section('content')
    <div class="user">
        {!! Form::open((array('files'=>true))) !!}
        <div class="inner_block_name">
            Order {{$item->brand->brand_name.' '.$item->model}}
        </div>
        @if($errors -> any())
            <div class="error">
                @foreach($errors->all() as $error)
                    {{$error}}
                    <br>
                @endforeach
                <br>
            </div>
        @endif
        <div class="user_page">
            <div class="order_info">
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    <br>
                    {!! Form::text('name', null, ['class'=>'textfield']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::label('surname', 'Surname:') !!}
                    <br>
                    {!! Form::text('surname', null, ['class'=>'textfield']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::label('email', 'E-mail:') !!}
                    <br>
                    {!! Form::text('email', $email, ['class'=>'textfield']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::label('phone', 'Phone (9 numbers):') !!}
                    <br>
                    {!! Form::text('phone', null, ['class'=>'textfield']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::label('post_index', 'Post index:') !!}
                    <br>
                    {!! Form::text('post_index', null, ['class'=>'textfield']) !!}
                </div>
                <div class="form-group">
                    <br>
                    {!! Form::label('address', 'Address:') !!}
                    <br>
                    {!! Form::text('address', null, ['class'=>'textfield']) !!}

                </div>
                <div class="form-group">
                    <br>
                    {!! Form::label('delivery', 'Delivery:') !!}
                    {!! Form::select('delivery', array(
                    'by post' => 'by post',
                    'by courier' => 'by courier', 'by post'), ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('order', ['class'=>'change']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection