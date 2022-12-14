<?php

namespace App\Repositorio\Api;

use App\Models\User;
use App\Repositorio\Api\Cliente\ClienteGuzzHttpRepositorio;
use App\Repositorio\Api\Cliente\ClienteHttpRepositorio;
use App\Repositorio\Session\SessionRepositorio;
use Exception;


class ApiRepositorio
{


    //clientes Http
    protected $clientHttpGuzz;
    protected $clientHttp;
    protected $user;

    //session
    protected $session;

    //urls


    public function __construct()
    {
        $this->clientHttp = new ClienteHttpRepositorio();
        $this->clientHttpGuzz = new ClienteGuzzHttpRepositorio();
        $this->user = new User();
        $this->session = new SessionRepositorio();
    }


    public function getToken($credencial)
    {

        try {
            $request = $this->clientHttpGuzz->getCliente()->request('POST', $this->clientHttpGuzz->getUrlToken(), [
                "headers" => [
                    'Content-Type' => "application/x-www-form-urlencoded",
                    'Accept' => "application/json"
                ],
                "form_params" => [
                    "grantType" => $credencial['grantType'],
                    "clientId" => $credencial['clientId'],
                    "clientSecret" => $credencial['clientSecret']
                ]
            ]);

            $format = json_decode($request->getBody());
            $this->session->set('token', 'Bearer ' .$format->accessToken);
            return response(["token" =>$format->accessToken],200,['Content-Type' => "application/json"]);
        } catch (Exception $e) {
            return response(["error" => $e->getMessage()],200,['Content-Type' => "application/json"]);
        }
    }
}
