@extends('layouts.master')

@section('content')

    <div id="section-profile" class="row">
        <div id="section-profile_picture" class="col-md-4">
            <div class="img-container">
                <img src="{{url('img/placehold-avatar.png')}}" class="img-rounded" width="100%">
            </div>
        </div>
        <div id="section-profile_info" class="col-md-8">
            <p class="profile-name">Hiram Guerrerock</p>
            <p><a href="#">hiramg90@gmail.com</a></p>
            <p>Has compartido 19 recursos</p>
            <p>Registrado desde 24 de Marzo de 2017</p>
        </div>
    </div>

@endsection