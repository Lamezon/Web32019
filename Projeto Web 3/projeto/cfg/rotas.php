<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\RaizControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],
    //OK^
    '/usuarios' => [
        'POST' => '\Controlador\UsuarioControlador#armazenar',
    ],
    '/usuarios/criar' => [
        'GET' => '\Controlador\UsuarioControlador#criar',
    ],
    '/usuarios/sucesso' => [
        'GET' => '\Controlador\UsuarioControlador#sucesso',
    ],
    '/locacao' => [
        'GET' => '\Controlador\IndexControlador#index',
        'POST' => '\Controlador\RegistroControlador#armazenar',
    ],
    '/locacao/?' => [
        'DELETE' => '\Controlador\RegistroControlador#destruir',
    ],
    '/carros/lista' => [
        'GET' => '\Controlador\ListaControlador#index',
        'POST' => '\Controlador\ListaControlador#locado',
    ],
    '/carros/lista/?' => [
        'GET' => '\Controlador\LocarControlador#index',

    ],

    '/carros/lista/locacao/devolver/?' => [
        'GET' => '\Controlador\DevolucaoControlador#index',

    ],

    '/carros/lista/reparo/?' => [
        'GET' => '\Controlador\ReparoControlador#index',

    ],
    '/carros/lista/reparar/?' => [
        'GET' => '\Controlador\ReparoControlador#reparar',

    ],
    '/carros/registrar' => [
        'GET' => '\Controlador\RegistroControlador#index',

    ],
    '/carros/relatorio' => [
        'GET' => '\Controlador\RelatorioControlador#index',
        'POST' => '\Controlador\ReparoControlador#reparado',
    ],
    '/carros/relatorio/?/detalhe' => [
        'GET' => '\Controlador\DetalheControlador#index',
    ],
];
