@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
<h1>Produtos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        Bem vindo ao Produtos.
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