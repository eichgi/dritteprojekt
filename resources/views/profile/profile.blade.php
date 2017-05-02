@extends('layouts.master')

@section('content')

    <div id="section-profile" class="row">
        <div class="card card-profile col-md-10 col-md-offset-1">
            <div id="section-profile_picture" class="col-md-4">
                <div class="img-container">
                    <img src="{{isset($github->avatar) ? $github->avatar : 'img/placehold-avatar.png'}}" class="img-rounded" width="100%">
                </div>
            </div>
            <div id="section-profile_info" class="col-md-8">
                <p class="profile-name">{{$usuario->name}}</p>
                @if(isset($github->profile_url))
                <p><a href="{{$github->profile_url}}" target="_blank">{{$github->nickname}} on Github</a></p>
                @endif
                <p><a href="mailto:{{$usuario->email}}">{{$usuario->email}}</a></p>
                <p>Has compartido {{$usuario->count}} recursos</p>
                @if(isset($github->bio))
                <p>Bio: {{$github->bio}}</p>
                @endif
                <p>Registrado desde hace {{$usuario->created_at->toFormattedDateString()}}</p>
            </div>
        </div>
    </div>

@endsection