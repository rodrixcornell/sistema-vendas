@extends('adminlte::page')

@section('title', 'Formulário de Produto')

@section('content_header')
<h1>Formulário de Produto</h1>
@stop

@section('content')
<div class="card">

    @if (!isset($produto))
        {!! Form::open(['route' => 'produtos.store']) !!}
    @else
        {!! Form::model($produto, ['route' => ['produtos.update', $produto], 'method' => 'put']) !!}
    @endif

    <div class="card-header"></div>

    <div class="card-body">
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::text('descricao', null, ['class' => 'form-control']) !!}

            @error('descricao')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('estoque', 'Estoque') !!}
                    {!! Form::number('estoque', null, ['class' => 'form-control']) !!}

                    @error('estoque')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('preco', 'Preço') !!}
                    {!! Form::text('preco', null, ['class' => 'form-control']) !!}

                    @error('preco')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fabricante_id', 'Fabricante') !!}
            {!! Form::select('fabricante_id', [], null, ['class' => 'form-control']) !!}

            @error('fabricante_id')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <div class="card-footer">
        {!! link_to(route('produtos.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']); !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
<script>
    $('#fabricante_id').select2({
        ajax: {
            // url: '//sistema-vendas.net/fabricante/search',
            url: '{{ route('fabricantes.select') }}',
            dataType: 'json',
            data: function (params) {
                return {
                    pesquisa: params.term
                }
            },

            processResults: function (data) {
                return {
                    results: data
                }
            }
        }
    })
</script>
@stop