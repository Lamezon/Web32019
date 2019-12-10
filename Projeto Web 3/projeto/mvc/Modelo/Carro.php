<?php

namespace Modelo;

use Framework\DW3ImagemUpload;
use Framework\DW3Sessao;
use \PDO;
use \Framework\DW3BancoDeDados;

class Carro extends Modelo
{
    const BUSCAR_DISPONIBILIDADE = 'SELECT l.id as id, l.marca as marca, l.modelo as modelo, l.ano as ano, l.cor as cor, l.preco as preco, l.disponibilidade as disponibilidade, l.custo as custo, l.lucro as lucro, l.placa as placa, l.numero_reparos as numero_reparos, l.numero_locacoes as numero_locacoes FROM locacao.carros l WHERE l.disponibilidade = ? ORDER BY marca';
    const BUSCAR_LUCRO = 'SELECT * FROM `carros` WHERE lucro>=custo';
    const BUSCAR_PREJUIZO = 'SELECT * FROM `carros` WHERE custo>lucro';
    const BUSCAR_TODOS = 'SELECT * FROM `carros` WHERE 1 ORDER BY disponibilidade';
    const BUSCAR_FILTRO = 'SELECT * FROM `carros` WHERE `modelo` = ? ORDER BY id DESC;';
    const BUSCAR_MARCA = 'SELECT * FROM `carros` WHERE marca = ?';
    const BUSCAR_ID = 'SELECT * FROM `carros` WHERE id = ?';
    const INSERIR = 'INSERT INTO `carros` (`id`, `marca`, `modelo`, `ano`, `cor`,  `preco`, `disponibilidade`, `custo`, `lucro`, `placa`,`numero_reparos`,`numero_locacoes`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    const DELETAR = 'DELETE FROM `carros` WHERE id = ?';
    const CONTAR_TODOS = 'SELECT count(id) FROM carros';
    const UPDATE_CUSTO = 'UPDATE `carros` SET custo = (custo + ?), numero_reparos = (numero_reparos+1) WHERE id = ?';
    const UPDATE_LUCRO = 'UPDATE `carros` SET lucro = (lucro + ?), numero_locacoes = (numero_locacoes+1) WHERE id = ?';
    const INDISPONIBILIZA = 'UPDATE `carros` SET  disponibilidade = 0 WHERE id = ?';
    const DISPONIBILIZA = 'UPDATE `carros` SET  disponibilidade = 1 WHERE id = ?';
    const MECANICO = 'UPDATE `carros` SET  disponibilidade = 2 WHERE id = ?';

    private $id;
    private $marca;
    private $modelo;
    private $ano;
    private $cor;
    private $preco;
    private $disponibilidade;
    private $custo;
    private $lucro;
    private $placa;
    private $numero_reparos;
    private $numero_locacoes;

    public function __construct($id = null,
                                $marca,
                                $modelo,
                                $ano,
                                $cor,
                                $preco,
                                $disponibilidade,
                                $custo,
                                $lucro,
                                $placa,
                                $numero_reparos,
                                $numero_locacoes

    )

    {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->cor = $cor;
        $this->preco = $preco;
        $this->disponibilidade = $disponibilidade;
        $this->custo = $custo;
        $this->lucro = $lucro;
        $this->placa = $placa;
        $this->numero_reparos = $numero_reparos;
        $this->numero_locacoes = $numero_locacoes;


    }

    /**
     * @return mixed
     */
    public function getNumeroReparos()
    {
        return $this->numero_reparos;
    }

    /**
     * @return mixed
     */
    public function getNumeroLocacoes()
    {
        return $this->numero_locacoes;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    public function getPreco()
    {
        return $this->preco;
    }


    /**
     * @return mixed
     */
    public function getDisponibilidade()
    {
        return $this->disponibilidade;
    }

    /**
     * @return mixed
     */
    public function getCusto()
    {
        return $this->custo;
    }

    /**
     * @return mixed
     */
    public function getLucro()
    {
        return $this->lucro;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }



    public function salvar()
    {

        $this->inserir();


    }

    private function inserir()
    {


        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->id, PDO::PARAM_INT);
        $comando->bindValue(2, $this->marca, PDO::PARAM_STR);
        $comando->bindValue(3, $this->modelo, PDO::PARAM_STR);
        $comando->bindValue(4, $this->ano, PDO::PARAM_STR);
        $comando->bindValue(5, $this->cor, PDO::PARAM_STR);
        $comando->bindValue(6, $this->preco, PDO::PARAM_INT);
        $comando->bindValue(7, $this->disponibilidade, PDO::PARAM_INT);
        $comando->bindValue(8, $this->custo, PDO::PARAM_INT);
        $comando->bindValue(9, $this->lucro, PDO::PARAM_STR);
        $comando->bindValue(10, $this->placa, PDO::PARAM_STR);
        $comando->bindValue(11, $this->numero_reparos, PDO::PARAM_INT);
        $comando->bindValue(12, $this->numero_locacoes, PDO::PARAM_INT);

        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();


    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $objeto = null;
        $registro = $comando->fetch();
        if ($registro) {
            $objeto = new Carro(
                $registro['id'],
                $registro['marca'],
                $registro['modelo'],
                $registro['ano'],
                $registro['cor'],
                $registro['preco'],
                $registro['disponibilidade'],
                $registro['custo'],
                $registro['lucro'],
                $registro['placa'],
                $registro['numero_reparos'],
                $registro['numero_locacoes']
            );

        }
        return $objeto;
    }

    public static function atualizaCusto($custo, $id){
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::UPDATE_CUSTO);
        $comando->bindValue(1, $custo, PDO::PARAM_INT);
        $comando->bindValue(2, $id, PDO::PARAM_INT);
        $comando->execute();
        DW3BancoDeDados::getPdo()->commit();
    }
    public static function indisponibiliza($id){
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INDISPONIBILIZA);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        DW3BancoDeDados::getPdo()->commit();
    }
    public static function disponibiliza($id){
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::DISPONIBILIZA);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        DW3BancoDeDados::getPdo()->commit();
    }
    public static function mecanico($id){
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::MECANICO);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        DW3BancoDeDados::getPdo()->commit();
    }
    public static function buscaDisponibilidade($disponibilidade)
    {

        DW3BancoDeDados::prepare(self::BUSCAR_DISPONIBILIDADE);
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_DISPONIBILIDADE);
        $comando->bindValue(1, $disponibilidade, PDO::PARAM_INT);


        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Carro(
                $registro['id'],
                $registro['marca'],
                $registro['modelo'],
                $registro['ano'],
                $registro['cor'],
                $registro['preco'],
                $registro['disponibilidade'],
                $registro['custo'],
                $registro['lucro'],
                $registro['placa'],
                $registro['numero_reparos'],
                $registro['numero_locacoes']

            );
        }

        return $objetos;
    }
    public static function buscarLucro()
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_LUCRO);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Carro(
                $registro['id'],
                $registro['marca'],
                $registro['modelo'],
                $registro['ano'],
                $registro['cor'],
                $registro['preco'],
                $registro['disponibilidade'],
                $registro['custo'],
                $registro['lucro'],
                $registro['placa'],
                $registro['numero_reparos'],
                $registro['numero_locacoes']
            );
        }
        return $objetos;
    }

    public static function buscarPrejuizo()
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_PREJUIZO);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Carro(
                $registro['id'],
                $registro['marca'],
                $registro['modelo'],
                $registro['ano'],
                $registro['cor'],
                $registro['preco'],
                $registro['disponibilidade'],
                $registro['custo'],
                $registro['lucro'],
                $registro['placa'],
                $registro['numero_reparos'],
                $registro['numero_locacoes']
            );
        }

        return $objetos;
    }




    public static function atualizaLucro($lucro, $id){
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::UPDATE_LUCRO);
        $comando->bindValue(1, $lucro, PDO::PARAM_INT);
        $comando->bindValue(2, $id, PDO::PARAM_INT);
        $comando->execute();
        DW3BancoDeDados::getPdo()->commit();
    }

    public static function buscarTodos()
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_TODOS);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Carro(
                $registro['id'],
                $registro['marca'],
                $registro['modelo'],
                $registro['ano'],
                $registro['cor'],
                $registro['preco'],
                $registro['disponibilidade'],
                $registro['custo'],
                $registro['lucro'],
                $registro['placa'],
                $registro['numero_reparos'],
                $registro['numero_locacoes']
            );
        }

        return $objetos;
    }

    public static function contarTodos()
    {
        $registros = DW3BancoDeDados::query(self::CONTAR_TODOS);
        $total = $registros->fetch();
        return intval($total[0]);
    }

    public static function destruir($id)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        DW3Sessao::setFlash('mensagemFlash', 'Carro removido.');

    }






}