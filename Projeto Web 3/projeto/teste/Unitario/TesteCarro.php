<?php
namespace Teste\Unitario;

use \Teste\Teste;
use \Modelo\Usuario;
use \Modelo\Carro;
use \Framework\DW3BancoDeDados;

class TesteCarro extends Teste
{

    public function antes()
    {
        $usuario = new Usuario('lamezon', '123456789');
        $usuario->salvar();
        $this->usuarioId = $usuario->getId();
    }
    public function testeInserir()
    {
        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 0, "ABC1234", 0, 0);
        $carro->salvar();
        $query = DW3BancoDeDados::query("SELECT * FROM carros WHERE id = " . $carro->getId());
        $bdCarro = $query->fetch();
        $this->verificar($bdCarro['modelo'] === $carro->getModelo());
    }

    public function testeBuscarTodos()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1235", 0, 0))->salvar();
        $carros = Carro::buscarTodos();
        $this->verificar(count($carros) == 2);
    }

    public function testeContarTodos()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1235", 0, 0))->salvar();
        $total = Carro::contarTodos();
        $this->verificar($total == 2);
    }

    public function testeDestruir()
    {
        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 100, "ABC1234", 0, 0);
        $carro->salvar();
        Carro::destruir($carro->getId());
        $query = DW3BancoDeDados::query('SELECT * FROM carros');
        $bdCarro = $query->fetch();
        $this->verificar($bdCarro === false);
    }
    public function testeBuscarId()
    {

        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 100, "ABC1234", 0, 0);
        $carro->salvar();
        $buscaId = Carro::buscarId($carro->getId());
        $this->verificar($buscaId->getId() == $carro->getId());
    }
    public function testeAtualizaCusto()
    {

        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 100, "ABC1234", 0, 0);
        $carro->salvar();
        Carro::atualizaCusto(200, $carro->getId());
        $teste = (Carro::buscarId($carro->getId()));
        $this->verificar($teste->getCusto()==200);
    }

    public function testeAtualizaLucro()
    {

        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 0, "ABC1234", 0, 0);
        $carro->salvar();
        Carro::atualizaLucro(200, $carro->getId());
        $teste = (Carro::buscarId($carro->getId()));
        $this->verificar($teste->getLucro()==200);
    }
    public function testeDisponibiliza()
    {

        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 0, 0, 0, "ABC1234", 0, 0);
        $carro->salvar();
        Carro::disponibiliza($carro->getId());
        $teste = (Carro::buscarId($carro->getId()));

        $this->verificar($teste->getDisponibilidade()==1);
    }
    public function testeIndisponibiliza()
    {

        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 0, "ABC1234", 0, 0);
        $carro->salvar();
        Carro::indisponibiliza($carro->getId());
        $teste = (Carro::buscarId($carro->getId()));

        $this->verificar($teste->getDisponibilidade()==0);
    }
    public function testeEnviaMecanico()
    {

        $carro = new Carro(1, "TESLA", "TESLA MODELO", 2018, "BRANCO", 500, 1, 0, 0, "ABC1234", 0, 0);
        $carro->salvar();
        Carro::mecanico($carro->getId());
        $teste = (Carro::buscarId($carro->getId()));

        $this->verificar($teste->getDisponibilidade()==2);
    }
    public function testeBuscarLucro()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 300, "ASD1235", 0, 0))->salvar();
        (new Carro(3,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, -100, "ASD1235", 0, 0))->salvar();
        $total = Carro::buscarLucro();
        $this->verificar(count($total)==2);
    }
    public function testeBuscarPrejuizo()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 300, "ASD1235", 0, 0))->salvar();
        (new Carro(3,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, -100, "ASD1235", 0, 0))->salvar();
        $total = Carro::buscarPrejuizo();
        $this->verificar(count($total)==1);
    }


}
