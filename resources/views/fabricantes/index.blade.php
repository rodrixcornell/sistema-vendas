@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')
<h1>Fabricantes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        Bem vindo ao Fabricantes.
    </div>
    <div class="card-body">
        {!! $dataTable->table() !!}
    </div>
    <div class="card-footer"></div>
</div>
@stop

@section('css')
@stop

@section('js')
{!! $dataTable->scripts() !!}
@stop