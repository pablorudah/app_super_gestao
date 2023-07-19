<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class RegisterController extends Controller
{
    public function index(Request $request) {
        //dd('chegamos até aqui');

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário já existe. Escolha outro e-mail.';
        } 

        if($request->get('erro') == 2){
            $erro = 'Necessário Criar Conta para ter acesso à página.';
        } 

        return view('site.register', ['titulo' => 'Crie Sua Conta', 'erro' => $erro]);
    }

    public function register(Request $request) {
        $usuarioExistente = User::where('email', $request->input('email'))->first();

        if ($usuarioExistente) {
            // Se o usuário já existir, redireciona para a página de registro com erro 1
            return redirect()->route('site.registro', ['erro' => 1]);
        }

        // Se o usuário não existir, cria um novo registro no banco de dados
        $user = new User();
        
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('senha')); // Criptografa a senha antes de salvar
        
        $user->save();

        // Redireciona para a página de login com sucesso
        return redirect()->route('site.login')
                ->with('success', 'Conta criada com sucesso! Faça login para acessar.');
    }
}
