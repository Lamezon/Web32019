<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Usuario;
use \Framework\DW3Sessao;

class TesteLogin extends Teste
{
    public function testeAcesso()
    {
        $acesso = $this->get(URL_RAIZ . 'login');
        $this->verificarContem($acesso, 'Bem-Vindo');
    }

    public function testeLogin()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacao');
        $this->verificar(DW3Sessao::get('login') != null);
    }

    public function testeLoginInvalido()
    {
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123'
        ]);
        $this->verificarContem($resposta, 'inválido');
        $this->verificar(DW3Sessao::get('login') == null);
    }

    public function testeDeslogar()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $resposta = $this->delete(URL_RAIZ . 'login');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
        $this->verificar(DW3Sessao::get('login') == null);

    }
}
 