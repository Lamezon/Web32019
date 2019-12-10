<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Usuario;

class LoginControlador extends Controlador
{
    public function criar()
    {
        $this->visao('login/criar.php');
    }

    public function armazenar()
    {

        $usuario = Usuario::buscarLogin($_POST['login']);
        if ($usuario && $usuario->verificarSenha($_POST['password'])) {
            DW3Sessao::set('login', $usuario->getLogin());
            DW3Sessao::set('id', $usuario->getId());
            $this->redirecionar(URL_RAIZ . 'locacao');
        } else {
            $this->setErros(['login' => 'Login e/ou senha inválido(s)']);
            $this->visao('login/criar.php');
        }
    }

    public function destruir()
    {
        DW3Sessao::deletar('login');
        $this->redirecionar(URL_RAIZ . 'login');
    }
}
