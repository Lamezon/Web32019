<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Lista
{
    const BUSCAR_DISPONIBILIDADE = 'SELECT l.id as id, l.marca as marca, l.modelo as modelo, l.ano as ano, l.cor as cor, l.preco as preco, l.disponibilidade as disponibilidade, l.custo as custo, l.lucro as lucro, l.placa as placa, l.numero_reparos as numero_reparos, l.numero_locacoes as numero_locacoes FROM locacao.carros l WHERE l.disponibilidade = ? ORDER BY marca';
    const BUSCAR_LUCRO = 'SELECT * FROM `carros` WHERE lucro>=custo';
    const BUSCAR_PREJUIZO = 'SELECT * FROM `carros` WHERE custo>lucro';
    const BUSCAR_INDISPONIBILIDADE = 'SELECT l.id as id, l.marca as marca, l.modelo as modelo, l.ano as ano, l.cor as cor, l.preco as preco, l.disponibilidade as disponibilidade, l.custo as custo, l.lucro as lucro, l.placa as placa, l.numero_reparos as numero_reparos, l.numero_locacoes as numero_locacoes FROM locacao.carros l WHERE l.disponibilidade = 0 OR l.disponibilidade=2 ORDER BY marca';


    public static function buscaDisponibilidade($disponibilidade)
    {

        DW3BancoDeDados::prepare(self::BUSCAR_DISPONIBILIDADE);
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_DISPONIBILIDADE);
        $comando->bindValue(1, $disponibilidade, PDO::PARAM_BOOL);


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
    public static function buscaIndisponibilidade()
    {

        DW3BancoDeDados::prepare(self::BUSCAR_INDISPONIBILIDADE);
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_INDISPONIBILIDADE);
        $comando->bindValue(1, PDO::PARAM_BOOL);


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
}
