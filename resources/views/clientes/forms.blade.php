@extends('adminlte::page')

@section('title', 'Formulário de Cliente')

@section('content_header')
<h1>Formulário de Cliente</h1>
@stop

@section('content')
<div class="card">

    @if (!isset($cliente))
        {!! Form::open(['route' => 'clientes.store']) !!}
    @else
        {!! Form::model($cliente, ['route' => ['clientes.update', $cliente], 'method' => 'put']) !!}
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
            {!! Form::label('telefone', 'Telefone') !!}
            {!! Form::text('telefone', null, ['class' => 'form-control']) !!}

            @error('telefone')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}

            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('cpf', 'CPF') !!}
            {!! Form::text('cpf', null, ['class' => 'form-control']) !!}

            @error('cpf')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('cep', 'Cep') !!}
            {!! Form::text('cep', null, ['class' => 'form-control']) !!}

            @error('cep')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('logradouro', 'Logradouro') !!}
            {!! Form::text('logradouro', null, ['class' => 'form-control']) !!}

            @error('logradouro')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('bairro', 'Bairro') !!}
            {!! Form::text('bairro', null, ['class' => 'form-control']) !!}

            @error('bairro')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('localidade', 'Localidade') !!}
            {!! Form::text('localidade', null, ['class' => 'form-control']) !!}

            @error('localidade')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <div class="card-footer">
        {!! link_to(route('clientes.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']); !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
@stop