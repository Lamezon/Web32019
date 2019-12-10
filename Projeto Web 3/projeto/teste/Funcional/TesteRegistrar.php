<?php
namespace Teste\Funcional;

use Framework\DW3Sessao;
use \Teste\Teste;
use \Modelo\Carro;
use \Modelo\Usuario;
use \Framework\DW3BancoDeDados;

class TesteRegistrar extends Teste
{
    public function testeEntrarDeslogado()
    {
        $resposta = $this->get(URL_RAIZ . 'carros/registrar');
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'login');
        echo "testeEntrarDeslogado\n";
    }

    public function testeAcessoRegistro()
    {

        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $resposta = $this->get(URL_RAIZ . 'carros/registrar');
        $this->verificarContem($resposta, 'Preço da Locação');
        $this->verificarContem($resposta, 'Placa do Carro');
        echo "testeAcessoRegistro\n";
    }

    public function testeRealizaRegistro()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);
        $resposta = $this->get(URL_RAIZ . 'carros/registro', [
            'marca'=>'Marca',
            'modelo'=>'Modelo',
            'ano'=>2015,
            'cor'=>'Branco',
            'preco'=>150,
            'placa'=>'ABC1234'
        ]);
        $registro = $this->post(URL_RAIZ.'locacao',[
            $resposta
        ]);
        var_dump($resposta);
        $this->verificarContem($resposta, 'Carro Adicionado!');
        echo "testeRealizaRegistro";
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
        $mensagem = new Carro($this->usuario->getId(), 'Olá');
        $mensagem->salvar();
        $resposta = $this->delete(URL_RAIZ . 'locacao/' . $mensagem->getId());
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacao');
        $query = DW3BancoDeDados::query('SELECT * FROM locacao');
        $bdReclamacao = $query->fetch();
        $this->verificar($bdReclamacao === false);
    }

    public function testeDestruirDeOutroUsuario()
    {
        (new Usuario('Joao', '123456'))->salvar();
        $resposta = $this->post(URL_RAIZ . 'login', [
            'login' => 'Joao',
            'password' => '123456'
        ]);$outroUsuario = new Usuario('teste2@teste2.com', '123');
        $outroUsuario->salvar();
        $mensagem = new Carro($outroUsuario->getId(), 'Olá');
        $mensagem->salvar();
        $resposta = $this->delete(URL_RAIZ . 'locacao/' . $mensagem->getId());
        $this->verificarRedirecionar($resposta, URL_RAIZ . 'locacao');
        $query = DW3BancoDeDados::query('SELECT * FROM locacao');
        $bdReclamacao = $query->fetch();
        $this->verificar($bdReclamacao !== false);
    }
}
