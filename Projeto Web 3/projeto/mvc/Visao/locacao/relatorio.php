
<?php
$mensagemFlash = \Framework\DW3Sessao::getFlash('mensagemFlash');
if ($mensagemFlash) : ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $mensagemFlash ?>
    </div>
<?php endif ?>

<form method="GET" action="" style="text-align: center;">
    <h3>Filtrar por condição</h3>
    <select name="valorSelect" id="select">
        <option value=1>Todos</option>
        <option value=2>Lucrativos</option>
        <option value=3>Não Lucrativos</option>

    </select>
    <br>
    <input type="submit" value="Filtrar" id="filterbutton" class="btn btn-info">
</form>

<div style="margin-top: 2%; margin-left: 23%;">
    <table class="table table-striped table-dark" style="width: 70%; background-color: lightgray; color: black;">
        <tr>
            <th id="tableHeader">Marca</th>
            <th id="tableHeader">Modelo</th>
            <th id="tableHeader">Placa</th>
            <th id="tableHeader">Ano</th>
            <th id="tableHeader">Reparos</th>
            <th id="tableHeader">Locacoes</th>
            <th id="tableHeader">Total</th>
            <th id="tableHeader">Detalhe</th>
            <th id="tableHeader">EXCLUIR</th>

        </tr>
        <?php

        if(isset($_GET['valorSelect'])) {
            $valorSelect = $_GET['valorSelect'];
            if ($valorSelect == 1) {
                foreach ($locacoes as $locacao): ?>
                    <tr>
                        <td class="tg-0lax"> <?= $locacao->getMarca(); ?>
                        <td class="tg-0lax"> <?= $locacao->getModelo(); ?>
                        <td class="tg-0lax"> <?= $locacao->getPlaca(); ?>
                        <td class="tg-0lax"> <?= $locacao->getAno(); ?>
                        <td class="tg-0lax"> <?= $locacao->getNumeroReparos(); ?>
                        <td class="tg-0lax"> <?= $locacao->getNumeroLocacoes(); ?>

                            <?php if($locacao->getLucro()>=$locacao->getCusto()){
                            ?>
                        <td class="tg-0lax" style="background-color: lightgreen"> R$<?= intval($locacao->getLucro())-intval($locacao->getCusto()); ?>
                            <?php
                        }else{
                            ?>
                        <td class="tg-0lax" style="background-color: lightcoral"> R$<?= intval($locacao->getLucro())-intval($locacao->getCusto()); ?>
                            <?php
                            }
                        ?>
                        <td>
                            <form action="<?= URL_RAIZ . 'carros/relatorio/'.$locacao->getId().'/detalhe' ?>" method="get">
                                <input type="hidden" name="_metodo" value="get">
                                <button type="submit" class="btn btn-info">Ver</button>
                            </form></td>
                        <td>
                            <form action="<?= URL_RAIZ . 'locacao/'.$locacao->getId() ?>" method="post">
                                <input type="hidden" name="_metodo" value="DELETE">
                                <button type="submit" class="btn btn-danger">REMOVER CARRO</button>
                            </form></td>
                    </tr> <?php
                endforeach;
            } else {
                if($valorSelect == 2) {
                    foreach ($lucros as $lucro) : ?>
                        <tr>
                            <td class="tg-0lax"> <?= $lucro->getMarca(); ?>
                            <td class="tg-0lax"> <?= $lucro->getModelo(); ?>
                            <td class="tg-0lax"> <?= $lucro->getPlaca(); ?>
                            <td class="tg-0lax"> <?= $lucro->getAno(); ?>
                            <td class="tg-0lax"> <?= $lucro->getNumeroReparos(); ?>
                            <td class="tg-0lax"> <?= $lucro->getNumeroLocacoes(); ?>
                            <td class="tg-0lax" style="background-color: lightgreen"> R$<?= intval($lucro->getLucro()) - intval($lucro->getCusto()); ?>
                            <td>
                                <form action="<?= URL_RAIZ . 'carros/relatorio/'.$lucro->getId().'/detalhe' ?>" method="get">
                                    <input type="hidden" name="_metodo" value="get">
                                    <button type="submit" class="btn btn-info">Ver</button>
                                </form></td>
                            <td>
                                <form action="<?= URL_RAIZ . 'locacao/'.$lucro->getId() ?>" method="post">
                                    <input type="hidden" name="_metodo" value="DELETE">
                                    <button type="submit" class="btn btn-danger">REMOVER CARRO</button>
                                </form></td>

                        </tr>
                    <?php
                    endforeach;
                } else {
                    foreach ($prejuizos as $prejuizo) : ?>
                        <tr>
                            <td class="tg-0lax"> <?= $prejuizo->getMarca(); ?>
                            <td class="tg-0lax"> <?= $prejuizo->getModelo(); ?>
                            <td class="tg-0lax"> <?= $prejuizo->getPlaca(); ?>
                            <td class="tg-0lax"> <?= $prejuizo->getAno(); ?>
                            <td class="tg-0lax"> <?= $prejuizo->getNumeroReparos(); ?>
                            <td class="tg-0lax"> <?= $prejuizo->getNumeroLocacoes(); ?>

                            <td class="tg-0lax" style="background-color: lightcoral"> R$<?= intval($prejuizo->getLucro()) - intval($prejuizo->getCusto()); ?>
                            <td>
                                <form action="<?= URL_RAIZ . 'carros/relatorio/'.$prejuizo->getId().'/detalhe' ?>" method="get">
                                    <input type="hidden" name="_metodo" value="get">
                                    <button type="submit" class="btn btn-info">Ver</button>
                                </form></td>
                            <td>
                                <form action="<?= URL_RAIZ . 'locacao/'.$prejuizo->getId() ?>" method="post">
                                    <input type="hidden" name="_metodo" value="DELETE">
                                    <button type="submit" class="btn btn-danger">REMOVER CARRO</button>
                                </form></td>
                                <?php
                    endforeach;
                }
            }
        }
        ?>

    </table>
    <form action="<?= URL_RAIZ ?>locacao" method="get">
        <button type="submit" class="btn btn-danger" style="margin-left: 33%;" >Voltar</button>
    </form>
</div>
<style>
    #select {
        color: black;
    }
</style>