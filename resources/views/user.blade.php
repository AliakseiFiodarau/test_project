@extends('layouts.layout')
@section('sidebar')
@endsection
@section('content')
    <div class="user">
        {!! Form::open((array('files'=>true))) !!}
        <div class="inner_block_name">
            Edit user
        </div>
        <div class="user_page">
            <div class="user_portrait">
                <img src="{{asset('storage/'.$user->avatar)}}" alt="{{$user->name.' avatar'}}">
                <br>
                <div class="form-group">
                    {!! Form::file('image') !!}
                </div>
            </div>
            <div class="user_info">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    <br>
                    {!! Form::text('name' ,$user->name, ['class'=>'textfield']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail') !!}
                    <br>
                    {!! Form::text('email', $user->email, ['class'=>'textfield']) !!}
                </div>
                @if($errors -> any())
                    <div class="error">
                        @foreach($errors->all() as $error)
                            {{$error}}
                            <br>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'change']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection