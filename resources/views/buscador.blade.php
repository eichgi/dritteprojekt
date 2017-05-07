@extends('layouts.master')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        @include('partials.flash-message')
        <section id="section-busqueda" class="card col-md-10 col-md-offset-1">
            {!! Form::open(['url' => '/buscar', 'method' => 'GET']) !!}
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
                                @if(isset($filtering))
                                    {{ Form::checkbox($type->name, null, ($filtering[$key]) ? true : false)}}{{$type->name}}
                                @else
                                    {{ Form::checkbox($type->name, null, false)}}{{$type->name}}
                                @endif
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
            @if(isset($recursos))
                Tu búsqueda: <a href="#" style="font-style: italic">{{$searching}}</a>
                @foreach($recursos as $recurso)
                    {{--<div class="result">
                        <hr>
                        <h4>{{$recurso->name}}
                            <span class="label {{$recurso->class}}">
                                <i class="{{$recurso->icon}}"></i>
                                {{$recurso->tipo}}
                            </span>
                        </h4>
                        <i><a href="{{$recurso->link}}" target="_blank">{{$recurso->link}}</a></i>
                        <span class="text-gray span-left">Added {{$recurso->created_at}}</span>
                        <p>{{$recurso->description}}</p>
                    </div>--}}
                    <div class="result">
                        <hr>
                        <h4>{{$recurso->name}}
                            <span class="label {{$recurso->class}} span-left">
                                <i class="{{$recurso->icon}}"></i> {{$recurso->tipo}}
                            </span>
                            <span class="text-gray float-right hidden-xs">Agregado por {{$recurso->user}} {{Carbon\Carbon::parse($recurso->created_at)->diffForHumans()}}</span>
                        </h4>
                        <p>{{$recurso->description}}</p>
                        <a href="#" class="btn btn-link"><i>Ir al sitio!</i></a>
                        @if(session('usuario_id', ''))
                            {{--{!! Form::open(['url' => '/star/$', 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                            <button class="btn btn-success">{{ count(\App\Resource::find($recurso->id)->stars) }} <i class="fa fa-star color-yellow"></i></button>
                            <input type="hidden" name="resource" value="{{$recurso->id}}">
                            {!! Form::close() !!}--}}
                            <button class="btn btn-success btn-fav" data-id="{{$recurso->id}}">
                                <span class="star-counter">{{ count(\App\Resource::find($recurso->id)->stars) }}</span>
                                <i class="fa fa-star color-yellow"></i>
                            </button>
                        @else
                            <button class="btn btn-default">37 <i class="fa fa-star color-yellow"></i></button>
                        @endif
                    </div>
                @endforeach
                <br>
                <div class="text-center">
                    {{$recursos->appends(['searching' => session('searching', ''), 'types' => session('types', '')])->links()}}
                </div>
            @elseif (isset($searching) && $searching != '')
                <p>No se encontraron resultados para esta búsqueda</p>
            @else
                <p>Por favor define una búsqueda...</p>
            @endif

            {{--<div class="result">
                <hr>
                <h4>Android desde cero en Escuela Digital
                    <span class="label label-primary span-left">
                            <i class="fa fa-desktop"></i> Curso online
                    </span>
                    --}}{{--<span class="span-left">37 <i class="fa fa-star color-yellow"></i></span>--}}{{--
                    --}}{{--<button class="btn btn-sm btn-success float-right">
                        37 favs <i class="fa fa-star color-yellow"></i>
                    </button>--}}{{--
                    <span class="text-gray float-right hidden-xs">Added by Hiram Guerrero 3 months ago</span>
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolor earum eligendi exercitationem
                    fugiat illum minus obcaecati quaerat quis quos. Assumenda, porro, vitae. Beatae explicabo
                    necessitatibus numquam tempora voluptatibus. Laudantium.</p>
                <a href="#" class="btn btn-link"><i>Ir al sitio!</i></a>
                <a href="#" class="btn btn-success">37 <i class="fa fa-star color-yellow"></i></a>
            </div>--}}

            {{--<div class="result">
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
        </section>
    </div>

    {{--<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">
                        Android desde cero en Escuela Digital
                        <span class="label label-primary span-left">
                            <i class="fa fa-desktop"></i> Curso online
                        </span>
                        --}}{{--<span class="span-left">37 <i class="fa fa-star color-yellow"></i></span>--}}{{--
                        <button class="btn btn-sm btn-success float-right">37 favs <i
                                    class="fa fa-star color-yellow"></i>
                        </button>
                    </h4>
                    <h6 class="card-subtitle mb-2 text-primary">
                        <span class="text-gray span-left">Added by Hiram Guerrero 3 months ago</span>
                    </h6>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aliquid assumenda dignissimos
                        distinctio dolor expedita explicabo, hic illo incidunt iure libero minus odio officiis
                        perspiciatis quisquam recusandae sequi soluta veniam?
                    </p>
                    <a href="#" target="_blank" class="card-link btn btn-primary">Llevame al sitio!</a>
                    --}}{{--<a href="#" class="card-link">Another link</a>--}}{{--
                </div>
            </div>
        </div>
    </div>--}}
@endsection

@section('script')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-filtro').click(function (e) {
            $('.filter-container').toggle();
        });

        function displayIfPicked() {
            if ($('input:checked').length) {
                $('.filter-container').show();
            }
        }

        $('.btn-fav').click(function (e) {
            var btn = this;
            var id = $(this).data('id');
            $.ajax({
                url: 'http://localhost/dritteprojekt/public/star/fav',
                method: 'POST',
                data: {id: id},
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    if (response.status === 'OK') {
                        var counter = parseInt($(btn).find('.star-counter').html());
                        console.log(counter);
                        counter++;
                        $(btn).find('.star-counter').html(counter);
                    }
                }

            });
        });

        displayIfPicked();
    </script>
@endsection