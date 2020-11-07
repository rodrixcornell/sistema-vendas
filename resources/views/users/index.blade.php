@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1>Usuários</h1>
@stop

@section('content')
<a href="{{ route('users.create') }}">Novo Usuário</a>
<p>Bem vindo ao Usuário.</p>
@stop

@section('css')
@stop

@section('js')
@stop