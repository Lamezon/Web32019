<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="center-block site" >
    <h1 class="text-center">Locação de Carros</h1>


    <?php

    use Framework\DW3Sessao;

    ?>

    <?php
    if ($mensagemFlash) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $mensagemFlash ?>
        </div>
    <?php endif ?>
    <form action="<?= URL_RAIZ . 'login' ?>" method="post" style="float: right;">
        <input type="hidden" name="_metodo" value="DELETE">
        <button type="submit" class="btn btn-danger">Sair</button>
    </form>

    <form action="<?= URL_RAIZ . 'carros/relatorio';?>" method="get">
        <input type="hidden" name="_metodo" value="GET">
        <button type="submit" class="btn btn-info" name="relatorio" style="width: 100%;">Relatório da Empresa</button>
    </form>
    <br>
    <form action="<?= URL_RAIZ . 'carros/lista';?>" method="get">
        <input type="hidden" name="_metodo" value="GET">
        <button type="submit" class="btn btn-success" name="lista" style="width: 100%;">Lista de Carros</button>
    </form>
    <br>
    <form action="<?= URL_RAIZ . 'carros/registrar';?>" method="get">
        <input type="hidden" name="_metodo" value="GET">
        <button type="submit" class="btn btn-warning" name="lista" style="width: 100%;">Registrar Carro</button>
    </form>


<style>
    body{
        background-color: #2a5d84;
    }


</style>