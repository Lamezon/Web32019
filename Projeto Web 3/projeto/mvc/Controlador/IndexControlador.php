<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;

class IndexControlador extends Controlador
{
    public function index()
    {
        $this->verificarLogado();
        $this->visao('locacao/index.php', [
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash'),
        ]);
    }
}
