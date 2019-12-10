<?php
namespace Controlador;

use Framework\DW3Sessao;
use \Modelo\Usuario;

class UsuarioControlador extends Controlador
{
    public function criar()
    {
        $this->visao('usuarios/criar.php');
    }

    public function armazenar()
    {
        $usuario = new Usuario($_POST['login'], $_POST['password']);

        if ($usuario->isValido()) {
            if($_POST["password"] === $_POST["password2"]) {
                if($_POST["login"] !== $_POST["password"]) {
                    $usuario->salvar();
                    $this->redirecionar(URL_RAIZ . 'usuarios/sucesso');

                }else{
                    $this->setErros($usuario->getValidacaoErros());
                    $this->visao('usuarios/criar.php');
                }
            }else{
                $this->setErros($usuario->getValidacaoErros());
                $this->visao('usuarios/criar.php');
            }
        } else {
            $this->setErros($usuario->getValidacaoErros());
            $this->visao('usuarios/criar.php');
        }
    }



    public function sucesso()
    {
        DW3Sessao::setFlash('mensagemFlash', 'Usuário registrado no sistema!');
        $this->visao('usuarios/sucesso.php', [
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')
        ]);
    }
}
