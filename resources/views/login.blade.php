@extends('layouts.master')

@section('content')

    <div class="row">
        <section id="section-login" class="col-sm-6 col-sm-offset-3 card">
            <h3>Iniciar sesión con Github <i class="fa fa-github"></i></h3>
            <form>
                <div class="form-group">
                    <a href="#">
                        <input type="submit" class="btn btn-github" value="Entrar">
                    </a>
                </div>
            </form>
        </section>
    </div>

    <div class="row">
        <section id="section-about" class="col-sm-6 col-sm-offset-3 card">
            <h3>¿Por qué con Github?</h3>
            <p>Este sitio se construyó con la finalidad de ayudar a todas las personas que esten interesadas en aprender
                a programar, el sistema de control de versiones GIT es el más popular y usado, tarde o temprano tod@s
                los desarrolladores(as) debemos aprender a usarlo. Si nunca antes lo has usado es la oportunidad
                perfecta para que te crees una cuenta, aprendas a usarlo y de paso compartas material de calidad con los
                demás devs.</p>
        </section>
    </div>
@endsection