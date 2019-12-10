<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;
use \Modelo\Lista;


class RelatorioControlador extends Controlador
{

    public function index()
    {
        $this->verificarLogado();

        $this->visao('locacao/relatorio.php', [
            $valor = $this->pageStart(),
            'locacoes' =>Carro::buscarTodos(),
            'registros' => Carro::buscaDisponibilidade($valor),
            'lucros' => Carro::buscarLucro(),
            'prejuizos' => Carro::buscarPrejuizo()


        ]);
    }
    public function pageStart(){
        if (isset($_GET['disponibilidadeSelect'])){
            $verifica = $_GET['disponibilidadeSelect'];
            if ($verifica=="3"){
                return false;
            }else{
                return true;
            }
        }else{
            return null;
        }
    }




}
