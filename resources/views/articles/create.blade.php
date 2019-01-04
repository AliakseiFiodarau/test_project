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
        'files' => true,
        'url' => 'articles'
        )) !!}
        <div class="form-group">
            {!! Form::label('image', 'Choose an image for your article: ') !!}
            <br>
            <br>
            {!! Form::file('image') !!}
        </div>
        <br>
        <div class="form-group">
            {!! Form::label('article_name', 'Article name:') !!}
            <br>
            <br>
            {!! Form::text('article_name', null, ['class'=>'textfield']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('article_text', 'Article text:') !!}
            <br>
            {!! Form::textarea('article_text', null, ['class'=>'register_form',
            'cols'=>'101',
            'rows'=>'30']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'change']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
