<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = '';
        $erro = $request->get('erro');

        if($erro == 1){
            $mensagem = 'Usuário e/ou senha não existem';
        }
        if($erro == 2){
            $mensagem = 'É necessário fazer login para ter acesso a página';
        }
        
        return view('site.login', [
            'titulo' => 'Login',
            'erro' => $mensagem,
        ]);
    }

    public function autenticar(Request $request)
    {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Iniciar o model user
        $user = new User();
        $existe = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($existe->name)) {
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;

            return redirect()->route('app.customer');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        
    }

    public function exit()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
