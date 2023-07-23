<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = new Unidade();

        return view('app.produto_detalhe.create', ['unidades' => $unidades->all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());

        echo 'Cadastro realizado com sucesso!';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\ProdutoDetalhe $produtoDetalhe
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        //dd($produtoDetalhe);

        $unidades = new Unidade();

        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades->all()]);
    }

    /**
     * Update the specified resource in storage.
     * @param App\ProdutoDetalhe $produtoDetalhe
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());

        echo 'A edição foi realizada com sucesso!';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
