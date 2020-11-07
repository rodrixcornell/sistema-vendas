@extends('adminlte::page')

@section('title', 'Formulário de Usuário')

@section('content_header')
<h1>Formulário de Usuário</h1>
@stop

@section('content')
<div class="row">

    <div class="col-md-12">

      <div class="card card-primary">

        {!! Form::open(['route' => 'users.store']) !!}

            <div class="card-header"></div>

            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>        
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}

                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>        
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Senha') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>        
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('type', 'Tipo de Usuário') !!}
                    {!! Form::select('type', [0 => 'Vendedor', 1 => 'Administrador'], 0, ['class' => 'form-control']) !!}
                    
                    @error('type')
                        <small class="form-text text-danger">{{ $message }}</small>        
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! link_to(route('users.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']); !!}
            </div>
        
        {!! Form::close() !!}

        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop