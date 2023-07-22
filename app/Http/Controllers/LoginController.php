<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = $request->get('erro');

        if( $request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe.';
        } else if( $request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $validacao = [
            'usuario.email' => 'O campo Usuário (e-mail) é obrigatório.',
            'senha.required' => 'O campo Senha é obrigatório.'
        ];

        $request->validate($regras, $validacao);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
                        ->get()
                        ->first();

        if(isset($usuario->name)){            
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home'); 
        } else {
            return redirect()->route('site.login.index', ['erro' => '1']);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
