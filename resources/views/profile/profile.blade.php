@extends('layouts.master')

@section('content')

    <div id="section-profile" class="row">
        <div class="card card-profile col-md-10 col-md-offset-1">
            <div id="section-profile_picture" class="col-md-4">
                <div class="img-container">
                    <img src="{{url('img/placehold-avatar.png')}}" class="img-rounded" width="100%">
                </div>
            </div>
            <div id="section-profile_info" class="col-md-8">
                <p class="profile-name">{{$usuario->name}}</p>
                <p><a href="#">{{$usuario->email}}</a></p>
                <p>Has compartido {{$usuario->count}} recursos</p>
                <p>Registrado desde hace {{$usuario->created_at->toFormattedDateString()}}</p>
            </div>
        </div>
    </div>

@endsection