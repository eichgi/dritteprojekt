@extends('layouts.master')

@section('content')
    <div class="row">

        @include('partials.flash-message')

        <div id="section-resources" class="col-sm-10 col-sm-offset-1 card">

            <div class="options-heading">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation"><a href="#" id="my-resources">Mis recursos</a></li>
                    <li role="presentation" class="active"><a href="#" id="new-resource">Añadir nuevo</a></li>
                </ul>
            </div>
            <hr>
            <div class="options-container">
                <div id="table-resources" style="display: none">
                    <table id="resources" class="table table-striped" width="100%">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Enlace</th>
                            <th>Lenguaje</th>
                            {{--<th>Creación</th>--}}
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{$resource->name}}</td>
                                <td><a href="{{$resource->link}}" target="_blank">{{$resource->link}}</a></td>
                                <td>{{$resource->language->name}}</td>
                                {{--<td>{{$resource->created_at->diffForHumans()}}</td>--}}
                                <td>
                                    <a href="{{url("/resource/$resource->id/edit")}}" style="display: inline-block">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {!! Form::open(['url' => "/resource/$resource->id", 'method' => 'DELETE', 'class' => 'inline-block']) !!}
                                    {{Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        {{--<tr>
                            <td>Tutorial Node JS</td>
                            <td><a href="#">http://escuela.digital/nodejs</a></td>
                            <td>01 de Marzo de 2017</td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>

                <div id="form-resources">
                    @if(!isset($recurso))
                        @include('resources.form', ['url' => $url, 'method' => $method])
                    @else
                        @include('resources.form', ['recurso' => $recurso, 'url' => $url, 'method' => $method])
                    @endif
                </div>

                @if($errors)
                    @foreach($errors->all() as $error)
                        {{--<p class="label label-danger">{{$error}}</p>--}}
                    @endforeach
                @endif

            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>

        $('#new-resource').click(function () {
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('#form-resources').show().siblings().hide();
        });

        $('#my-resources').click(function () {
            $(this).parent().addClass('active').siblings().removeClass('active');
            $('#table-resources').show().siblings().hide();
        });

    </script>
@endsection