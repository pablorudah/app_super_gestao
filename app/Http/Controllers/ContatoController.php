<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:4|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ], [
            'nome.required' => 'O campo Nome precisa ser preenchido',
            'nome.min' => 'O campo Nome precisa ter no mínimo 4 caracteres',
            'nome.max' => 'O campo Nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O Nome informado já está em uso',
            'telefone.required' => 'O campo Telefone precisa ser preenchido',
            'email.required' => 'O campo Email precisa ser preenchido',
            'email.email' => 'O campo Email precisa ser um email válido',
            'motivo_contatos_id.required' => 'O campo Motivo do Contato precisa ser preenchido',
            'mensagem.required' => 'O campo Mensagem precisa ser preenchido',
            'mensagem.max' => 'O campo Mensagem pode ter no máximo 2000 caracteres',
        ]);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
