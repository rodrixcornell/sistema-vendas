<?php

namespace App\Http\Controllers;

use App\DataTables\ProdutoDataTable;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdutoDataTable $produtoDataTable)
    {
        return $produtoDataTable->render('produtos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $produto = ProdutoService::store($request->all());

        if (!$produto) return redirect()->route('produtos.index')->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('produtos.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        // return view('produtos.show', compact('produto'));
        return response($produto, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        return view('produtos.forms', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto = ProdutoService::update($request->all(), $produto);

        if (!$produto) return redirect()->route('produtos.edit', $produto)->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('produtos.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $exclusao = ProdutoService::destroy($produto);

        return response($exclusao, $exclusao ? 200 : 400);
        // if (!$produto) return redirect()->route('produtos.edit', $produto)->withErro('Ocorreu um erro ao excluir');
        // return redirect()->route('produtos.index')->withSucesso('Excluido com sucesso');
    }

    public function produtosSelect(Request $request)
    {
        return ProdutoService::produtosSelect($request->all());
    }
}
