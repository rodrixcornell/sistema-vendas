@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1>Usuários</h1>
@stop

@section('content')
{{-- <a href="{{ route('users.create') }}">Novo Usuário</a> --}}
<div class="card">
    <div class="card-header">
        Bem vindo ao Usuário.
    </div>
    <div class="card-body">
        {!! $dataTable->table() !!}
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
{!! $dataTable->scripts() !!}
@stop