<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        

        // Approach de visualização de dados dos detalhes dos Produtos sem o uso do Eloquent ORM
        /* foreach($produtos as $key => $produto) {
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)) {
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
            }
        }*/

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres.',
            'descricao.max' => 'O campo descricao deve ter no máximo 2000 caracteres.',
            'peso.integer' => 'O campo peso deve ser um número inteiro.',
            'unidade_id.exists' => 'A unidade de medida informada não existe.',
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => Unidade::all()]);

        //return view('app.produto.create', ['produto' => $produto, 'unidades' => Unidade::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //$request->all(); //payload

        //$produto //instância do objeto no estado anterior

        $produto->update($request->all()); //atualiza o objeto com os dados do payload

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
