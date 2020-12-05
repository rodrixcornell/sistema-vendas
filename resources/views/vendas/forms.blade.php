@extends('adminlte::page')

@section('title', 'PDV')

@section('content_header')
<h1>PDV</h1>
@stop

@section('content')
<div class="card">

    {{-- @if (!isset($venda)) --}}
        {!! Form::open(['route' => 'vendas.store', 'id' => 'formVenda']) !!}
    {{-- @else
        {!! Form::model($venda, ['route' => ['vendas.update', $venda], 'method' => 'put']) !!}
    @endif --}}

    <div class="card-header"></div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('cliente_id', 'Cliente') !!}
                    {!! Form::select('cliente_id', [], null, ['class' => 'form-control']) !!}

                    @error('cliente_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('forma_pagamento', 'Forma de Pagamento') !!}
                    {!! Form::select('forma_pagamento', $formaPagamento, null, ['class' => 'form-control']) !!}

                    @error('forma_pagamento')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('observacao', 'Observação') !!}
            {!! Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => 2]) !!}

            @error('observacao')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-4">
                <h3>Total: <span id="txt-total">0.00</span></h3>
            </div>
            <div class="col-md-4">
                <h3>Com Desconto: <span id="txt-desconto">0.00</span></h3>
            </div>
            <div class="col-md-4">
                <h3>Com Acréscimo: <span id="txt-acrescimo">0.00</span></h3>
            </div>
        </div>

    {{-- <div class="card-footer"> --}}
        {!! link_to(route('vendas.index'), 'Cancelar', ['class' => 'btn btn-secondary']) !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']); !!}
    {{-- </div> --}}

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('produtos', 'Produtos') !!}
                    {!! Form::select('produtos', [], null, ['class' => 'form-control']) !!}

                    @error('produtos')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('qtd', 'Quantidade') !!}
                    {!! Form::number('qtd', null, ['class' => 'form-control']) !!}

                    @error('qtd')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-2">
                <label>Ação</label>
                <button class="btn btn-success btn-block" onclick="adicionarItem()">Adicionar Produto</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody id="tabelaItensVenda">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {!! Form::close() !!}
</div>
@stop

@section('css')
@stop

@section('js')
<script>
    $('#cliente_id').select2({
        ajax: {
            // url: '//sistema-vendas.net/cliente/search',
            url: '{{ route('clientes.select') }}',
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

    $('#produtos').select2({
        ajax: {
            // url: '//sistema-vendas.net/produto/search',
            url: '{{ route('produtos.select') }}',
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

    $('#formVenda').submit(function (e) {
        e.preventDefault()
    })

    var itensVenda = []

    function adicionarItem () {
        let produto = $('#produtos').val()
        let qtd = $('#qtd').val()

        if (produto && qtd) {
            let urlBase = '{{ route('produtos.index') }}'

            axios.get(`${urlBase}/${produto}`)
                .then(({ data }) => {
                    // alert(JSON.stringify(data))
                    itensVenda.push({
                        id: data.id,
                        descricao: data.descricao,
                        preco: data.preco,
                        quantidade: qtd
                    })

                    atualizaTabel()
                })
                .catch(() => {
                    Swal.fire('Ops!', 'Erro ao selecionar produto', 'error')
                })
        } else {
            Swal.fire('Ops!', 'Selecione o produto e selecione a quantidade', 'error')
        }
    }

    var totalGeral = 0

    function atualizaTabel() {
        $('#tabelaItensVenda').empty()

        itensVenda.forEach((produto, index) => {
            let total = produto.preco * produto.quantidade

            totalGeral += total

            $('#tabelaItensVenda').append(`
            <tr>
                <th>
                    <input type="text" class="form-control" name="" value="${produto.descricao}" disabled>
                    <input type="hidden" class="form-control" name="produto_is[]" value="${produto.id}" readonly>
                </th>
                <th>
                    <input type="text" class="form-control" name="quantidade[]" value="${produto.quantidade}" readonly>
                </th>
                <th>
                    <input type="text" class="form-control" value="${produto.preco}" readonly>
                </th>
                <th>
                    <input type="text" class="form-control" value="${total.toFixed(2)}" readonly>
                </th>
            </tr>
            `)
        })
    }
</script>
@stop