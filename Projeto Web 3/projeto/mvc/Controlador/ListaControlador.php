<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;
use \Modelo\Lista;


class ListaControlador extends Controlador
{

    public function index()
    {
        $this->verificarLogado();

        $this->visao('locacao/lista.php', [
            $valor = $this->pageStart(),
            'locacoes' =>Carro::buscarTodos(),
            'naodisponiveis' =>Lista::buscaIndisponibilidade(),
            'registros' => Lista::buscaDisponibilidade($valor),
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')

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
    public function locado(){
        $this->verificarLogado();

        $carro = new Carro(
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
        $lucro = ((intval($_POST["dias"]))*(intval($_POST["preco"])));
        $id = (intval($_POST["identificador"]));
        $carro::atualizaLucro($lucro, $id);
        $carro::indisponibiliza($id);
        DW3Sessao::setFlash('mensagemFlash', 'Carro locado!');
        $this->visao('locacao/lista.php', [

        ]);

    }




}
