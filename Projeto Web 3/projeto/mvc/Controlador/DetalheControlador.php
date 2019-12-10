<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;

class DetalheControlador extends Controlador
{
    public function index($id)
    {
        $this->verificarLogado();
        $carro = Carro::buscarId($id);
        $this->visao('locacao/detalhe.php', [
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash'),
            'carro' => $carro
        ]);
    }
}
