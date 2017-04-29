@extends('layouts.master')

@section('content')

    <div class="row">
        <section id="section-busqueda" class="card col-md-10 col-md-offset-1">
            {!! Form::open(['url' => '/buscador', 'method' => 'GET']) !!}
            <div class="form-group">
                <input type="text" class="form-control" name="searching" placeholder="Escribe tu busqueda..."
                       value="{{ (isset($searching) && $searching != 'Últimos recursos agregados') ? $searching : ''}}">
            </div>
            <div class="form-group">
                <div class="btn btn-sm btn-default btn-filtro">Filtrar</div>
                <div class="filter-container">
                    @foreach($types as $key => $type)
                        <div class="checkbox-inline">
                            <label>
                                {{ Form::checkbox($type->name, null, ($filtering[$key]) ? true : false)}}{{$type->name}}
                                {{--<input type="checkbox" name="{{$type->name}}"> {{$type->name}}--}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="BUSCAR">
            </div>
            {!! Form::close() !!}
        </section>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <hr class="styled-hr">
        </div>
    </div>
    <div class="row">
        <section id="section-results" class="card col-md-10 col-md-offset-1">
            @if($recursos)
                Tu búsqueda: <a href="#" style="font-style: italic">{{$searching}}</a>
                @foreach($recursos as $recurso)
                    <div class="result">
                        <hr>
                        <h4>{{$recurso->name}}
                            <span class="label {{$recurso->class}}">
                            <i class="{{$recurso->icon}}"></i>
                                {{$recurso->tipo}}
                        </span>
                        </h4>
                        <a href="{{$recurso->link}}" target="_blank">{{$recurso->link}}</a>
                        <p>{{$recurso->description}}</p>
                    </div>
                @endforeach
                <br>
                <div class="text-center">
                    @if($searching)
                        {{$recursos->appends(['searching' => 'PHP'])->links()}}
                    @else
                        {{$recursos->appends(['searching' => ''])->links()}}
                    @endif
                </div>
            @else
                <p>No se encontraron resultados para esta búsqueda</p>
            @endif

            {{--<div class="result">
                <hr>
                <h4>Android desde cero en Escuela Digital <span class="label label-primary"><i
                                class="fa fa-desktop"></i> Curso online</span></h4>
                <a href="#">http://escuela.digital/android-desde-cero</a>
                <p>Este curso es premium y es la versión 2017, clases grabadas en vivo...</p>
            </div>

            <div class="result">
                <hr>
                <h4>Todo Android <span class="label label-danger"><i
                                class="fa fa-youtube"></i> Canal</span></h4>
                <a href="#">http://youtube.com/todo-android</a>
                <p>Canal en youtube con más de 200 vídeos y contando donde aprenderás como...</p>
            </div>

            <div class="result">
                <hr>
                <h4>El Gran Libro de Android :: Marshmallow <span class="label label-success"><i
                                class="fa fa-book"></i> Libro</span></h4>
                <a href="#">http://marcombo.com/el-gran-libro-de-android-2016</a>
                <p>Uno de los mejores libros para Android en Castellano y con guías para...</p>
            </div>--}}

            {{--<nav class="text-center" aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>--}}
        </section>
    </div>
@endsection

@section('script')
    <script>
        $('.btn-filtro').click(function (e) {
            $('.filter-container').toggle();
        });
    </script>
@endsection