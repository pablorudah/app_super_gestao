<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use \App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index() 
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->Paginate(5);        

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $message = '';

        //inclusão de novos registros de fornecedores
        if($request->input('_token') != '' && $request->input('id') == '') {
                
            $regras = [
                'nome' => 'required|min:4|max:40|unique:fornecedores',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido.',
                'nome.required' => 'O campo Nome deve ser preenchido.',
                'nome.min' => 'O campo Nome deve ter no mínimo 4 caracteres.',
                'nome.max' => 'O campo Nome deve ter no máximo 40 caracteres.',
                'nome.unique' => 'O Nome informado já está em uso.',
                'site.required' => 'O campo Site deve ser preenchido.',
                'uf.required' => 'O campo UF deve ser preenchido.',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres.',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres.',
                'email.email' => 'O Email informado não é válido.',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $message = 'Cadastro realizado com sucesso!';
        };

        //edição de registros de fornecedores
        if($request->input('_token') != '' && $request->input('id') != '') {
            
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());

            if($update) {
                $message = 'Atualização realizada com sucesso!';
            } else {
                $message = 'Erro ao atualizar o cadastro!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'message' => $message]);
        };

        return view('app.fornecedor.adicionar', ['message' => $message]);
    }

    public function editar($id, $message = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'message' => $message]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
