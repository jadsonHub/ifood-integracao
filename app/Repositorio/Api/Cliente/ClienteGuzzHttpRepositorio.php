<?php

namespace App\Repositorio\Api\Cliente;

use App\Models\User;

class ClienteGuzzHttpRepositorio
{
    protected $urlToken;
    protected $urlGetProtudos;
    protected User $user;

    public function __construct()
    {
        $this->urlToken = "https://merchant-api.ifood.com.br/authentication/v1.0/oauth/token";
       // $this->urlGetProtudos = "https://merchant-api.ifood.com.br/catalog/v1.0/".$this->user->find('mercado_id');

    }

    public function getCliente(){
        return new \GuzzleHttp\Client();
    }

    public function getUrlToken(){
        return $this->urlToken;
    }
    


}
