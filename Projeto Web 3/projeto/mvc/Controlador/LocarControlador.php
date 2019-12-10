<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;
use \Modelo\Lista;


class LocarControlador extends Controlador
{

    public function index($id)
    {
        $this->verificarLogado();

        $this->visao('locacao/locar.php', [
            $valor = $this->pageStart(),
            'selecionados' =>Carro::buscarId($id),

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
