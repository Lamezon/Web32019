<?php

?>

<h1>Detalhes do Carro</h1>

<table>
    <thead>
        <tr>
        </tr>
    </thead>
    <tbody>
    <tr><td><h2>Marca</h2><h3><?=$carro->getMarca()?></h3></td></tr>

    <tr><td><h2>Modelo</h2><h3><?=$carro->getModelo()?></h3></td></tr>

    <tr><td><h2>Placa</h2><h3><?=$carro->getPlaca()?></h3></td></tr>

    <tr><td><h2>Ano</h2><h3><?=$carro->getAno()?></h3></td></tr>

    <tr><td><h2>Cor</h2><h3><?=$carro->getCor()?></h3></td></tr>

    <tr><td><h2>Número de Reparos Totais</h2><h3><?=$carro->getNumeroReparos()?>, isso gerou um custo para você de: R$<?=$carro->getCusto()?></h3></td></tr>

    <tr><td><h2>Número de Locações Totais</h2><h3><?=$carro->getNumeroLocacoes()?>, isso gerou um lucro para você de: R$<?=$carro->getLucro()?></h3></td></tr>

    <tr><td><h2>Valor Total</h2><h3>R$ <?=number_format($carro->getLucro()-$carro->getCusto(), 2)?></h3></td></tr>


    </tbody>
</table>
<center>
<form style="margin-right: 24%; margin-top: 1%" action="<?= URL_RAIZ ?>carros/relatorio" method="get">
    <button type="submit" class="btn btn-danger" style="margin-left: 33%;" >Voltar</button>
</form>
<style>
    h1{
        text-align: center;
        text-decoration:underline;
    }

    h2{
        text-align: center;
        color: #5cb85c;
        font-size: 2rem;
    }
    h3{
        text-align: center;
        font-size: 1.5rem;
    }
    table{
        margin-left: 35%;
        margin-right: 35%;
        width: 30%;
    }

</style>