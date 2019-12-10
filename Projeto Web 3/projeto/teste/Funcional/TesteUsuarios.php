<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Usuario;
use \Framework\DW3BancoDeDados;

class TesteUsuarios extends Teste
{
    public function testeCriar()
    {
        $resposta = $this->get(URL_RAIZ . 'usuario/cadastrar');
        $this->verificarContem($resposta, 'Cadastrar');
    }

    public function testeArmazenar()
    {
        $resposta = $this->post(URL_RAIZ . 'usuario/cadastrar', [
            'nome' => 'Mario',
            'email' => 'mario@teste.com',
            'senha' => '123',
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'usuario/sucesso');
        $resposta = $this->get(URL_RAIZ . 'usuario/sucesso');
        $this->verificarContem($resposta, 'Parabéns!');
        $query = DW3BancoDeDados::query('SELECT * FROM usuarios WHERE email = "mario@teste.com"');
        $bdUsuarios = $query->fetchAll();
        $this->verificar(count($bdUsuarios) == 1);
    }
}