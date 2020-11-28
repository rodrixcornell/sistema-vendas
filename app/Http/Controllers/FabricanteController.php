<?php

namespace App\Http\Controllers;

use App\DataTables\FabricanteDataTable;
use App\Fabricante;
use App\Http\Requests\StoreFabricantePost;
use App\Services\FabricanteService;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FabricanteDataTable $fabricanteDataTable)
    {
        return $fabricanteDataTable->render('fabricantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabricantes.forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFabricantePost $request)
    {
        // dd($request);
        // fabricante::Create($request->all());
        $fabricante = FabricanteService::store($request->all());

        if (!$fabricante) return redirect()->route('fabricantes.index')->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('fabricantes.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        return view('fabricantes.show', compact('fabricante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        return view('fabricantes.forms', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFabricantePost $request, Fabricante $fabricante)
    {
        $fabricante = FabricanteService::update($request->all(), $fabricante);

        if (!$fabricante) return redirect()->route('fabricantes.edit', $fabricante)->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('fabricantes.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricante)
    {
        $exclusao = FabricanteService::destroy($fabricante);

        return response($exclusao, $exclusao ? 200 : 400);
        // if (!$fabricante) return redirect()->route('fabricantes.edit', $fabricante)->withErro('Ocorreu um erro ao excluir');
        // return redirect()->route('fabricantes.index')->withSucesso('Excluido com sucesso');
    }
}
