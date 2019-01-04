@extends('layouts.layout')
@section('sidebar')
@endsection
@section('content')
    <div class="register_form">
        @if($errors -> any())
            <div class="error">
                @foreach($errors->all() as $error)
                    {{$error}}
                    <br>
                @endforeach
            </div>
        @endif
        {!! Form::open(array(
        'url' => 'reviews/store/'.$id)) !!}
        <div class="form-group">
            {!! Form::label('review_name', 'Review name:') !!}
            <br>
            <br>
            {!! Form::text('review_name', null, ['class'=>'textfield']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('review_text', 'Review text:') !!}
            <br>
            {!! Form::textarea('review_text', null, ['class'=>'register_form',
            'cols'=>'101',
            'rows'=>'30']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'change']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
