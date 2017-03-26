@extends('layouts.master')

@section('content')

    <div class="row">
        <section id="section-searching" class="col-xs-12">
            <h1>¿Qué deseas aprender?</h1>
            <form>
                <div class="form-group col-xs-10 col-xs-offset-1">
                    <input type="text" class="form-control" name="buscar">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-lg" value="BUSCAR">
                </div>
            </form>
        </section>
    </div>

    <div class="row">
        <section id="section-info" class="col-xs-12">
            <h1>Estos son los recursos que encontrarás:</h1>
            <br>
            <div id="section-info_element" class="col-sm-4">
                <div class="circle-for-icon">
                    <i class="fa fa-book"></i></div>
                <p>Libros de programación</p>
            </div>
            <div id="section-info_element" class="col-sm-4">
                <div class="circle-for-icon">
                    <i class="fa fa-youtube"></i></div>
                <p>Canales en Youtube</p>
            </div>
            <div id="section-info_element" class="col-sm-4">
                <div class="circle-for-icon">
                    <i class="fa fa-desktop"></i>
                </div>
                <p>Cursos en línea</p>
            </div>
            <div id="section-info_element" class="col-sm-4">
                <div class="circle-for-icon">
                    <i class="fa fa-rss"></i>
                </div>
                <p>Guías y Blogs</p>
            </div>
            <div id="section-info_element" class="col-sm-4">
                <div class="circle-for-icon">
                    <i class="fa fa-git"></i>
                </div>
                <p>Repositorios</p>
            </div>
            <div id="section-info_element" class="col-sm-4">
                <div class="circle-for-icon">
                    <i class="fa fa-podcast"></i></div>
                <p>Podcasts online</p>
            </div>
        </section>
    </div>

    <div class="row">
        <section id="section-support" class="col-xs-12">
            <h1>¿Interesado en participar y compartir?</h1>
            <br>
            <a href="#" class="btn btn-primary btn-lg">
                Entrar con Github
                <i class="fa fa-github"></i>
            </a>
        </section>
    </div>

@endsection