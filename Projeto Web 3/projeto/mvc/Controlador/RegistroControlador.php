<?php
namespace Controlador;

use \Framework\DW3Sessao;
use \Modelo\Carro;

class RegistroControlador extends Controlador
{
    private function calcularPaginacao()
    {
        $pagina = array_key_exists('p', $_GET) ? intval($_GET['p']) : 1;
        $limit = 5;
        $offset = ($pagina - 1) * $limit;
        $carro = Carro::buscarTodos($limit, $offset);
        $ultimaPagina = ceil(Carro::contarTodos() / $limit);
        return compact('pagina', 'carro', 'ultimaPagina');
    }

    public function index()
    {
        $this->verificarLogado();
        $paginacao = $this->calcularPaginacao();
        $this->visao('locacao/registrar.php', [
            'locacao' => $paginacao['carro'],
            'pagina' => $paginacao['pagina'],
            'ultimaPagina' => $paginacao['ultimaPagina'],
            'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')
        ]);
    }



        public function armazenar()
    {
        $this->verificarLogado();

        $carro = new Carro(
            null,
            $_POST['marca'],
            $_POST['modelo'],
            $_POST['ano'],
            $_POST['cor'],
            $_POST['preco'],
            true,
            0,
            0,
            $_POST['placa'],
            0,
            0


        );

        if ($carro->isValido()) {
            $carro->salvar();
            DW3Sessao::setFlash('mensagemFlash', 'Carro Adicionado!');
            $this->redirecionar(URL_RAIZ . 'locacao');

        } else {
            $paginacao = $this->calcularPaginacao();
            $this->setErros($carro->getValidacaoErros());
            $this->visao('locacao/index.php', [
                'locacao' => $paginacao['carro'],
                'pagina' => $paginacao['pagina'],
                'ultimaPagina' => $paginacao['ultimaPagina'],
                'mensagemFlash' => DW3Sessao::getFlash('mensagemFlash')
            ]);
        }
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        $carro = Carro::buscarId($id);
        Carro::destruir($id);
        DW3Sessao::setFlash('mensagemFlash', 'Carro Removido.');
        $this->redirecionar(URL_RAIZ . 'locacao');
    }
}
