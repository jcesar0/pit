<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.auth');
    }

    /*
     * Será feita a verificação para checar se há um user logado, caso sim irá dar logout
     * tentará encontrar um email se não encontrar irá retornar para rota de login com uma msg erro
     * caso encontre irá fazer a verificação das senhas se não forem iguais irá retornar para rota login com uma msg erro
     * se passar pelas instruções acima irá logar o user com remember ativo e o redirecionar para home
     *
     * obs: deixei 2 msg de erro iguais (quando não econtra o email e quando a senha não confere)
     * para caso de que alguma atualização necessite de informar se o email está errado tenha que apenas trocar a msg
     */
    public function login(LoginRequest $request)
    {
        if (Auth::user()) Auth::logout();

        $user = User::where('email', '=', $request->email)->first();

        if(!$user)
            return redirect()->route('login')->withErrors('Dados incorretos');

        if (!Hash::check($request->password, $user->password))
            return redirect()->route('login')->withErrors('Dados incorretos');

        Auth::login($user, true);
        return redirect()->route('home');
    }

    /*
     * Será feita a verificação para checar se há um user logado, caso sim irá dar logout
     * Pegará os parametros do request e será criada a conta
     * após isso redirecionará o user para rota de login
     */
    public function register(RegisterRequest $request)
    {
        if (Auth::user()) Auth::logout();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success_alert', 'Conta criada com sucesso!');
    }

    /*
     * Será verificado se não está logado, caso não esteja irá redicionar para rota login,
     * caso contrário irá fazer logout e redicionar para rota login com uma msg de erro informando que ele está deslogado
     */
    public function logout()
    {
        if (!Auth::user()) return redirect()->route('login');

        Auth::logout();
        return redirect()->route('login')->withErrors('Você está deslogado faça login');
    }

}
