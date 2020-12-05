<?php

namespace App\Http\Controllers;

use App\DataTables\VendaDataTable;
use App\Http\Requests\StoreVendaPost;
use App\Models\Venda;
use App\Services\VendaService;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VendaDataTable $vendaDataTable)
    {
        return $vendaDataTable->render('vendas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendas.forms', [
            'formaPagamento' => Venda::FORMA_PAGAMENTO
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendaPost $request)
    {
        // dd($request);
        // venda::Create($request->all());
        $venda = VendaService::store($request->all());

        if (!$venda) return redirect()->route('vendas.index')->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('vendas.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        return view('vendas.forms', compact('venda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(StorevendaPost $request, venda $venda)
    {
        $venda = VendaService::update($request->all(), $venda);

        if (!$venda) return redirect()->route('vendas.edit', $venda)->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('vendas.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        $exclusao = VendaService::destroy($venda);

        return response($exclusao, $exclusao ? 200 : 400);
        // if (!$venda) return redirect()->route('vendas.edit', $venda)->withErro('Ocorreu um erro ao excluir');
        // return redirect()->route('vendas.index')->withSucesso('Excluido com sucesso');
    }

    public function vendasSelect(Request $request)
    {
        return VendaService::vendasSelect($request->all());
    }
}
