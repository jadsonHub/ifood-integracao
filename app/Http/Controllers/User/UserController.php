<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Repositorio\User\UserRepositorio;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepositorio;

    public function __construct()
    {
        $this->userRepositorio = new UserRepositorio();
    }

    public function cadastrarCredenciais()
    {
        return view('User.cadastro');
    }

    public function login(){
        return view('User.login');
    }

    public function postCredencial(UserRequest $credencial)
    {
       
        if($this->userRepositorio->cadastrarCredencial($credencial->input())){
            return redirect('/')->with('msg-success','Conta criada e autenticada!');
        }
        return redirect('/')->with('msg-error','Falha ao criar conta e atenticar, por favor verifique as suas credencias do ifood');
    }
}
