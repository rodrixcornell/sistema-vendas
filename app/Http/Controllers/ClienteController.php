<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteDataTable;
use App\Http\Requests\StoreClientePost;
use App\Models\Cliente;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientePost $request)
    {
        // dd($request);
        // Cliente::Create($request->all());
        $cliente = ClienteService::store($request->all());

        if (!$cliente) return redirect()->route('clientes.index')->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('clientes.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.forms', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientePost $request, Cliente $cliente)
    {
        $cliente = ClienteService::update($request->all(), $cliente);

        if (!$cliente) return redirect()->route('clientes.edit', $cliente)->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('clientes.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $exclusao = ClienteService::destroy($cliente);

        return response($exclusao, $exclusao ? 200 : 400);
        // if (!$cliente) return redirect()->route('clientes.edit', $cliente)->withErro('Ocorreu um erro ao excluir');
        // return redirect()->route('clientes.index')->withSucesso('Excluido com sucesso');
    }

    public function clientesSelect(Request $request)
    {
        return ClienteService::clientesSelect($request->all());
    }
}
