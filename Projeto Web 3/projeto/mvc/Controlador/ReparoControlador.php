<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;
use \Modelo\Lista;


class ReparoControlador extends Controlador
{

    public function index($id)
    {
        $this->verificarLogado();

        $this->visao('locacao/reparar.php', [
            'selecionados' =>Carro::buscarId($id),

        ]);
    }

    public function reparado()
    {
        $this->verificarLogado();
        $carro = new Carro(null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null

        );
        DW3Sessao::setFlash('mensagemFlash', 'Carro retornou do mecânico!');
        $custo = (intval($_POST["preco"]));
        $id = (intval($_POST["identificador"]));
        $carro::atualizaCusto($custo, $id);
        $carro::disponibiliza($id);
        $this->visao('locacao/relatorio.php', [
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')
        ]);

    }

    public function reparar($id)
    {

        $this->verificarLogado();

        $carro = new Carro(null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null

        );
        DW3Sessao::setFlash('mensagemFlash', 'Carro enviado para o reparo!');
        $carro::mecanico($id);
        $this->visao('locacao/reparo.php', [
            'selecionados' =>Carro::buscarId($id),
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')


        ]);

    }





}
