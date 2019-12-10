<?php
namespace Teste\Funcional;

use \Teste\Teste;
use \Modelo\Carro;
use \Modelo\Usuario;
use \Framework\DW3BancoDeDados;

class TestePerguntas extends Teste
{/*
    public function testeListagemDeslogado()
    {
        $resposta = $this->get(URL_RAIZ . 'locacao');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
    }

    public function testeListagem()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        (new Carro($id = null, $this->usuarioId, $this->usuarioLogin, '1', 'Essa é a pergunta inserida',
            'alternativa1', 'alternativa2', 'alternativa3', 'alternativa4', 'alternativa5', null, 0, 3))->salvar();
        $resposta = $this->get(URL_RAIZ . 'locacao');
        $this->verificarContem($resposta, 'Create Question');
        $this->verificarContem($resposta, 'Essa é a');
    }

    public function testeArmazenarDeslogado()
    {
        $resposta = $this->post(URL_RAIZ . 'locacao', [
            'texto' => 'Olá deslogado'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
    }

    public function testeArmazenar()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $resposta = $this->post(URL_RAIZ . 'locacao', [
            'texto' => 'Olá logado'
        ]);
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacao');
        $query = DW3BancoDeDados::query('SELECT * FROM locacao');
        $bdReclamacoes = $query->fetchAll();
        $this->verificar(count($bdReclamacoes) == 1);
    }

    public function testeDestruir()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $mensagem = new Carro($id = null, $this->usuarioId, $this->usuarioLogin, '1', 'Essa é a pergunta inserida',
            'alternativa1', 'alternativa2', 'alternativa3', 'alternativa4', 'alternativa5', null, 0, 3);
        $mensagem->salvar();
        $resposta = $this->delete(URL_RAIZ . 'locacao/' . $mensagem->getId());
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacao');
        $query = DW3BancoDeDados::query('SELECT * FROM locacao');
        $bdPerguntas = $query->fetch();
        $this->verificar($bdPerguntas === false);
    }

    public function testeDestruirDeOutroUsuario()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $outroUsuario = new Usuario('usuario2', '123', '123');
        $outroUsuario->salvar();
        $mensagem = new Carro($id = null, $this->usuarioId, $this->usuarioLogin, '1', 'Essa é a pergunta inserida',
            'alternativa1', 'alternativa2', 'alternativa3', 'alternativa4', 'alternativa5', null, 0, 3);
        $mensagem->salvar();
        $resposta = $this->delete(URL_RAIZ . 'locacao/' . $mensagem->getId());
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacao');
        $query = DW3BancoDeDados::query('SELECT * FROM locacao');
        $bdReclamacao = $query->fetch();
        $this->verificar($bdReclamacao !== false);
    }*/
}
