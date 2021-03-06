@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br>
            <div class="pregunta card">
                <h4>¿Qué es Rovix?</h4>
                <p>La finalidad de Rovix es compartir recursos sobre programación, todos en algún
                    momento nos hemos encontrado con la necesidad de aprender sobre alguna tecnología, herramienta,
                    lenguaje, etc... Ya sea que hallas leído algún libro, visto vídeos en Youtube o comprado cursos en
                    plataformas de pago puedes venir aquí y compartir tu experiencia sobre cual y como dicho material te
                    ayudo a aprender. Aquí encontrarás con una comunidad de programadores que esta en constante
                    crecimiento y hambrientos de aprender y dominar nuevas herramientas.</p>
            </div>

            <div class="pregunta card">
                <h4>¿Interesado en participar?</h4>
                <p>Una vez que te hayas registrado debes ir a <a href="{{url('/resource')}}">recursos</a> y empieza a
                    compartir el material que tanto te ha
                    ayudado a aprender y que sabes que también le puede servir a alguien más!</p>
            </div>

            <div class="pregunta card">
                <h4>Disclaimer</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci dicta dolor earum et, iste non
                    perspiciatis tenetur velit veniam, voluptate, voluptatum? Accusantium at consectetur fuga
                    necessitatibus temporibus ut voluptates!</p>
            </div>

            <div class="pregunta card">
                <h4>Sobre el creador</h4>
                <p>Hiram Guerrero es un desarrollador apasionado por construir herramientas que conecten a las
                    personas, que sirvan para un fin común y de paso disfrutar una de las actividades que más retos le
                    ha impuesto. Si quieres conocer más sobre él entra <a href="http://eichgi.com"
                                                                          target="_blank">aquí</a>
                </p>
            </div>
        </div>
    </div>
@endsection