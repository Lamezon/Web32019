
<?php
$mensagemFlash = \Framework\DW3Sessao::getFlash('mensagemFlash');
if ($mensagemFlash) : ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $mensagemFlash ?>
    </div>
<?php endif ?>

<form method="GET" action="" style="text-align: center;">
    <h3>Filtrar Por Disponibilidade</h3>
    <select name="disponibilidadeSelect" id="select">
        <option value=1>Todos</option>
        <option value=2>Disponíveis para locação</option>
        <option value=3>Não Disponíveis para locação</option>

    </select>
    <br>
    <input type="submit" value="Filter" id="filterbutton" class="btn btn-info">
</form>

<div style="margin-top: 2%; margin-left: 23%;">
    <table class="table table-striped table-dark" style="width: 70%; background-color: lightgray; color: black;">
        <tr>
            <th id="tableHeader">Marca</th>
            <th id="tableHeader">Modelo</th>
            <th id="tableHeader">Placa</th>
            <th id="tableHeader">Ano</th>
            <th id="tableHeader">Cor</th>
            <th id="tableHeader">Preço</th>
            <th id="tableHeader">Status</th>
            <th id="tableHeader">Reparo</th>
        </tr>
        <?php

        if(isset($_GET['disponibilidadeSelect'])) {

        $disponibilidadeSelect = $_GET['disponibilidadeSelect'];
        if ($disponibilidadeSelect == 1) {
        foreach ($locacoes as $locacao): ?>
        <tr>
            <td class="tg-0lax"> <?= $locacao->getMarca(); ?>
            <td class="tg-0lax"> <?= $locacao->getModelo(); ?>
            <td class="tg-0lax"> <?= $locacao->getPlaca(); ?>
            <td class="tg-0lax"> <?= $locacao->getAno(); ?>
            <td class="tg-0lax"> <?= $locacao->getCor(); ?>
            <td class="tg-0lax"> R$<?= $locacao->getPreco(); ?>


                <?php
                if ($locacao->getDisponibilidade() == 1){
                ?>
            <td class="tg-0lax" style="background-color: #5cb85c; text-align: center"><a
                        href="lista/<?= $locacao->getId() ?>">Locar</a></td>
            <td class="tg-0lax" style="background-color: darkslategray; text-align: center"><a
                        href="lista/reparar/<?= $locacao->getId() ?>">Enviar Para Reparo</a></td>
            <?php }
            else if ($locacao->getDisponibilidade() == 2) {

                ?>
                <td class="tg-0lax" style="background-color: darkorange; text-align: center"><a
                            href="lista/reparo/<?= $locacao->getId() ?>" style="text-decoration: none; ">Mecânico</a>
                </td>
                <?php
            } else {
                ?>

                <td class="tg-0lax" style="background-color: lightcoral; text-align: center"><a
                            href="lista/locacao/devolver/<?= $locacao->getId() ?>" style="text-decoration: none; ">Devolver</a>
                </td>
                <?php
            }
            ?>

        </tr> <?php
        endforeach;
        } else if($disponibilidadeSelect == 2){
        foreach ($registros as $registro) : ?>
        <tr>
            <td class="tg-0lax"> <?= $registro->getMarca(); ?>
            <td class="tg-0lax"> <?= $registro->getModelo(); ?>
            <td class="tg-0lax"> <?= $registro->getPlaca(); ?>
            <td class="tg-0lax"> <?= $registro->getAno(); ?>
            <td class="tg-0lax"> <?= $registro->getCor(); ?>
            <td class="tg-0lax">R$ <?= $registro->getPreco(); ?>
                <?php
                if ($registro->getDisponibilidade() == 1){
                ?>
            <td class="tg-0lax" style="background-color: #5cb85c; text-align: center"><a id="<?= $registro->getId() ?>"
                                                                                         href="lista/<?= $registro->getId() ?>">Locar</a>
            </td>
            <td class="tg-0lax" style="background-color: darkslategray; text-align: center"><a
                        id="<?= $registro->getId() ?>" href="lista/reparar/<?= $registro->getId() ?>">Enviar Para
                    Reparo</a></td>
            <?php }

            else {
                ?>

                <td class="tg-0lax" style="background-color: lightcoral; text-align: center"><a
                            href="lista/locacao/devolver/<?= $registro->getId() ?>" class="link">Devolver</a></td>
                <?php
            }
            ?>

        </tr>
        <?php
        endforeach;
                }else{
        foreach ($naodisponiveis as $naodisponivel) : ?>
        <tr>
            <td class="tg-0lax"> <?= $naodisponivel->getMarca(); ?>
            <td class="tg-0lax"> <?= $naodisponivel->getModelo(); ?>
            <td class="tg-0lax"> <?= $naodisponivel->getPlaca(); ?>
            <td class="tg-0lax"> <?= $naodisponivel->getAno(); ?>
            <td class="tg-0lax"> <?= $naodisponivel->getCor(); ?>
            <td class="tg-0lax">R$ <?= $naodisponivel->getPreco(); ?>
                <?php
                if ($naodisponivel->getDisponibilidade() == 2){
                ?>
                    <td class="tg-0lax" style="background-color: darkorange; text-align: center"><a
                                href="lista/reparo/<?= $naodisponivel->getId() ?>" style="text-decoration: none; ">Mecânico</a>
                    </td>
            <td class="tg-0lax"></td>
                    </tr>
            <?php }

            else {

                ?>
                <td class="tg-0lax" style="background-color: lightcoral; text-align: center"><a
                            href="lista/locacao/devolver/<?= $naodisponivel->getId() ?>" class="link">Devolver</a></td>
                <?php
            }
            ?>
        <?php
        endforeach;
        }
        }
        ?>

    </table>
    <form action="<?= URL_RAIZ ?>locacao" method="get">
        <button type="submit" class="btn btn-danger" style="margin-left: 33%;" >Back</button>
    </form>
</div>
<style>
    #select {
        color: black;
    }
    #tableHeader {
        text-align: center;
    }
    td{
        border-left-style: solid;
        border-bottom-style: solid;
        border-width: 1.5px;
    }

</style>