@extends('layouts.master')

@section('content')

    {{--@if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Sign up</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => url('/signup'), 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        {{Form::text('name', '', ['class' => 'form-control'])}}
                        @if($errors->has('name'))
                            <span class="label label-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::email('email', '', ['class' => 'form-control'])}}
                        @if($errors->has('email'))
                            <span class="label label-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Password')}}
                        <input type="password" name="password" class="form-control">
                        @if($errors->has('password'))
                            <span class="label label-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Repetir password')}}
                        <input type="password" name="repassword" class="form-control">
                        @if($errors->has('repassword'))
                            <span class="label label-danger">{{$errors->first('repassword')}}</span>
                        @endif
                    </div>
                    <div class="form-group text-center">
                        {{Form::submit('Sign up', ['class' => 'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}

                    {{--@include('partials.flash-message')--}}
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection