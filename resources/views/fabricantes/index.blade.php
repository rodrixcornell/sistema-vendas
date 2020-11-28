@extends('adminlte::page')

@section('title', 'Fabricantes')

@section('content_header')
<h1>Fabricantes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        Bem vindo ao Fabricantes.
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

<script>
    function excluir(rota) {
        // console.log(window.LaravelDataTables)
        // console.log(Object.keys(window.LaravelDataTables)[0])
        Swal.fire({
            title: 'Atenção?',
            text: "Deseja mesmo excluir?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(rota)
                    .then((data) => {
                        $('#' + Object.keys(window.LaravelDataTables)[0]).DataTable().ajax.reload()
                        Swal.fire(
                            'Perfeito!',
                            'Excluido com sucesso.',
                            'success'
                        )
                    })
                    .catch((err) => {
                        Swal.fire(
                            'Ops!',
                            'Error ao excluir.',
                            'success'
                        )
                    })
            }
        })
    }
</script>
@stop