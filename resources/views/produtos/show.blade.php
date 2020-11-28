@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
<h1>Produto</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($produto, ['route' => ['produtos.destroy', $produto], 'method' => 'delete']) !!}

    <div class="card-header"></div>

    <div class="card-body">
        <h1>Deseja mesmo excluir este produto?</h1>
        <h2>{{ $produto->nome }}</h2>
    </div>

    <div class="card-footer">
        {!! link_to(route('produtos.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']); !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
@stop