{!! Form::open(['url' => $url, 'method' => $method]) !!}

<div class="form-group">
    <label>Nombre del recurso:</label>
    <input type="text" name="name" class="form-control" value="{{isset($recurso) ? $recurso->name : ''}}">
    @if($errors->has('name'))
        <span class="label label-danger">{{$errors->first('name')}}</span>
    @endif
</div>
<div class="form-group">
    <label>Tipo:</label>
    {{Form::select('type_id', $types, (isset($recurso) ? $recurso->type_id : ''), ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {{--<input type="checkbox" name="has_cost">--}}
            {{Form::checkbox('has_cost', '', (isset($recurso) and $recurso->has_cost == 1 ? true : false))}}
            Es un recurso de pago
        </label>
    </div>

</div>
<div class="form-group">
    <label>Lenguaje:</label>
    {{Form::select('language_id', $languages, (isset($recurso) ? $recurso->language_id : ''), ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label>Enlace:</label>
    {{Form::text('link', (isset($recurso) ? $recurso->link : ''), ['class' => 'form-control'])}}
    @if($errors->has('link'))
        <span class="label label-danger">{{$errors->first('link')}}</span>
    @endif
</div>
<div class="form-group">
    <label>Descripción:</label>
    {{Form::textarea('description', (isset($recurso) ? $recurso->description : ''), ['class' => 'form-control'])}}
    @if($errors->has('description'))
        <span class="label label-danger">{{$errors->first('description')}}</span>
    @endif
</div>
<div class="form-group text-center">
    <input type="submit" class="btn btn-primary" value="GUARDAR RECURSO">
</div>
{!! Form::close() !!}