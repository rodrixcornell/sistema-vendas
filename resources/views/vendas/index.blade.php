@extends('adminlte::page')

@section('title', 'Vendas')

@section('content_header')
<h1>Vendas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        Bem vindo ao Vendas.
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