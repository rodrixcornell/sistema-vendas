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
            {!! Form::email('email', null, ['class' => 'form-control']) !!}

            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('cpf', 'CPF') !!}
            {!! Form::number('cpf', null, ['class' => 'form-control']) !!}

            @error('cpf')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('cep', 'Cep') !!}
            {!! Form::number('cep', null, ['class' => 'form-control', 'onfocusout' => 'buscaCep()']) !!}

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

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('bairro', 'Bairro') !!}
                    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}

                    @error('bairro')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('localidade', 'Localidade') !!}
                    {!! Form::text('localidade', null, ['class' => 'form-control']) !!}

                    @error('localidade')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
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
<script>
    function buscaCep () {
        let cep = $('#cep').val()
        // https://viacep.com.br/ws/cep/json/
        // alert('https://viacep.com.br/ws/' + cep + '/json/')
        axios.get(`https://viacep.com.br/ws/${cep}/json/`)
            .then(( {data} ) => {
                console.log(data)
                $('#logradouro').val(data.logradouro)
                $('#bairro').val(data.bairro)
                $('#localidade').val(data.localidade)
            })
            .catch(() => {
                Swal.fire(
                    'Ops!',
                    'Erro ao consultar CEP',
                    'error'
                )
            })
    }
</script>
@stop