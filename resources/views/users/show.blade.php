@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
<h1>Usuário</h1>
@stop

@section('content')
{{-- <a href="{{ route('users.create') }}">Novo Usuário</a> --}}
<div class="card">
    {!! Form::model($user, ['route' => ['users.destroy', $user], 'method' => 'delete']) !!}

    <div class="card-header"></div>

    <div class="card-body">
        <h1>Deseja mesmo excluir este usuário?</h1>
        <h2>{{ $user->name }}</h2>
    </div>

    <div class="card-footer">
        {!! link_to(route('users.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']); !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
@stop