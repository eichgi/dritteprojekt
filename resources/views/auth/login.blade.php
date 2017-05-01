@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Login</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => url('/login'), 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::email('email', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Password')}}
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        {{Form::submit('Entrar', ['class' => 'btn btn-primary'])}}
                        <a href="{{url('/login/github')}}" class="btn btn-primary">
                            Entrar con Github <i class="fa fa-github"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}

                    @include('partials.flash-message')
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <a href="{{url('/signup')}}" class="btn btn-primary">Registrarme para acceder</a>
                </div>
            </div>
        </div>
        {{--<div class="col-sm-6">
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
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::email('email', '', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Password')}}
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        {{Form::submit('Registrarse', ['class' => 'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}

                    @include('partials.flash-message')
                </div>
            </div>
            <br>
        </div>--}}
    </div>

@endsection