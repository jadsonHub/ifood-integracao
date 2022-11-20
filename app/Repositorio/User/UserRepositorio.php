<?php

namespace App\Repositorio\User;

use App\Models\User;
use App\Repositorio\Api\ApiRepositorio;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class UserRepositorio
{

    protected $user;
    protected $apiRepositorio;


    public function __construct()
    {
        $this->user = new User();
        $this->apiRepositorio = new ApiRepositorio();
    }

    public function getToken($credencial)
    {

        $response = json_decode($this->apiRepositorio->getToken($credencial)->content());

        if (!isset($response->token)) {
            return false;
        }
        return true;
    }

    public function cadastrarCredencial($user)
    {


        $token = $this->getToken([
            "grantType" => "client_credentials",
            "clientId" => $user['cliente_id'],
            "clientSecret" => $user['cliente_secreto']
        ]);

        if ($token) {

            $cliente = $this->user->create([
                'mercado_id' => $user['mercado_id'],
                'cliente_id' => $user['cliente_id'],
                'cliente_secreto' => $user['cliente_secreto'],
                'email' => $user['email'],
                "password" => bcrypt($user['password'])
            ]);

            if ($cliente) {
                return Auth::attempt(['email' => $user['email'], 'password' => $user['password']]);
            }
        }

        return false;
    }
}
