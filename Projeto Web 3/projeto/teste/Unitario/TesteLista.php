<?php
namespace Teste\Unitario;

use Modelo\Lista;
use \Teste\Teste;
use \Modelo\Usuario;
use \Modelo\Carro;
use \Framework\DW3BancoDeDados;

class TesteLista extends Teste
{
    private $usuarioId;

    public function antes()
    {
        $usuario = new Usuario('usuario', 'password');
        $usuario->salvar();
        $this->usuarioId = $usuario->getId();
        $this->usuarioLogin = $usuario->getLogin();
    }

    public function testeBuscarDisponibilidade()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(3,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(4,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        $busca = (Lista::buscaDisponibilidade(1));
        $resultado = (count($busca));
        $this->verificar($resultado==2);
    }
    public function testeBuscarLucro()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, -100, "ASD1234", 0, 0))->salvar();
        (new Carro(3,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, 600, "ASD1234", 0, 0))->salvar();
        (new Carro(4,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, -800, "ASD1234", 0, 0))->salvar();
        $busca = (Lista::buscarLucro());
        $resultado = (count($busca));
        $this->verificar($resultado==2);

    }
    public function testeBuscaPrejuizo()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, -300, "ASD1234", 0, 0))->salvar();
        (new Carro(3,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, -200, "ASD1234", 0, 0))->salvar();
        (new Carro(4,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, -1000, "ASD1234", 0, 0))->salvar();
        $busca = (Lista::buscarPrejuizo());
        $resultado = (count($busca));
        $this->verificar($resultado==3);
    }
    public function testeBuscarIndisponibilidade()
    {
        (new Carro(1,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 1, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(2,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(3,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, 100, "ASD1234", 0, 0))->salvar();
        (new Carro(4,"TESLA1", "TESLAMODELO1", 2018, "BRANCO", 500, 0, 0, 100, "ASD1234", 0, 0))->salvar();
        $busca = (Lista::buscaIndisponibilidade());
        $resultado = (count($busca));
        $this->verificar($resultado==3);

    }
}
