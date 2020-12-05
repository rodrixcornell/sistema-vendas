@extends('adminlte::page')

@section('title', 'Fabricante')

@section('content_header')
<h1>Fabricante</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($fabricante, ['route' => ['fabricantes.destroy', $fabricante], 'method' => 'delete']) !!}

    <div class="card-header"></div>

    <div class="card-body">
        <h1>Deseja mesmo excluir este fabricante?</h1>
        <h2>{{ $fabricante->nome }}</h2>
    </div>

    <div class="card-footer">
        {!! link_to(route('fabricantes.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']); !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
@stop