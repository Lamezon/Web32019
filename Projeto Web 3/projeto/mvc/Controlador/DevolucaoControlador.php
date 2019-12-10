<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;
use \Modelo\Lista;


class DevolucaoControlador extends Controlador
{

    public function index($id)
    {
        $this->verificarLogado();
        $this->devolver($id);
        $paginacao = $this->calcularPaginacao();
        DW3Sessao::setFlash('mensagemFlash', 'Carro Devolvido!');
        $this->visao('locacao/devolucao.php', [
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')

        ]);
    }

    public function devolver($id)
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

        $carro::disponibiliza($id);

    }

    private function calcularPaginacao()
    {
        $pagina = array_key_exists('p', $_GET) ? intval($_GET['p']) : 1;
        $limit = 5;
        $offset = ($pagina - 1) * $limit;
        $carros = Carro::buscarTodos($limit, $offset);
        $ultimaPagina = ceil(Carro::contarTodos() / $limit);
        return compact('pagina', 'carros', 'ultimaPagina');
    }





}
