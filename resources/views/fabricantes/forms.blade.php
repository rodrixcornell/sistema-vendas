@extends('adminlte::page')

@section('title', 'Formulário de Fabricante')

@section('content_header')
<h1>Formulário de Fabricante</h1>
@stop

@section('content')
<div class="card">

    @if (!isset($fabricante))
        {!! Form::open(['route' => 'fabricantes.store']) !!}
    @else
        {!! Form::model($fabricante, ['route' => ['fabricantes.update', $fabricante], 'method' => 'put']) !!}
    @endif

    <div class="card-header"></div>

    <div class="card-body">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class' => 'form-control']) !!}

            @error('nome')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('site', 'Site') !!}
            {!! Form::text('site', null, ['class' => 'form-control']) !!}

            @error('site')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <div class="card-footer">
        {!! link_to(route('fabricantes.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']); !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
@stop