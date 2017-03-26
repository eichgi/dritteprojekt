@extends('layouts.master')

@section('content')
    <div class="row">
        <div id="section-resources" class="col-sm-10 col-sm-offset-1 card">

            <div class="options-heading">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation" class="active"><a href="#" id="my-resources">Mis recursos</a></li>
                    <li role="presentation"><a href="#" id="new-resource">Añadir nuevo</a></li>
                </ul>
            </div>
            <hr>
            <div class="options-container">

                <table id="resources" class="table table-striped" width="100%">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Enlace</th>
                        <th>Creación</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tutorial Node JS</td>
                        <td><a href="#">http://escuela.digital/nodejs</a></td>
                        <td>01 de Marzo de 2017</td>
                    </tr>
                    </tbody>
                </table>

                <form id="form-resources" style="display: none;">
                    <div class="form-group">
                        <label>Nombre del recurso:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <select name="type" class="form-control">
                            <option value="1">Libro</option>
                            <option value="2">Canal Youtube</option>
                            <option value="2">Plataforma de Cursos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="price" value="">
                                Es un recurso de pago
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lenguaje:</label>
                        <select name="language" class="form-control">
                            <option value="1">Javascript</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Enlace:</label>
                        <input type="text" name="link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="GUARDAR RECURSO">
                    </div>
                </form>
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
            $('#resources').show().siblings().hide();
        });

    </script>
@endsection