<?php

?>


<h3><center>Confirmar locação</center></h3>
<form action="<?= URL_RAIZ . 'carros/lista' ?>" method="post" enctype="multipart/form-data">
<div style="margin-top: 2%; margin-left: 23%;">

    <table class="table table-striped table-dark" style="width: 70%; background-color: lightgray; color: black;">
        <tr>
            <th id="tableHeader">Marca</th>
            <th id="tableHeader">Modelo</th>
            <th id="tableHeader">Placa</th>
            <th id="tableHeader">Ano</th>
            <th id="tableHeader">Cor</th>
            <th id="tableHeader">Preço</th>
        </tr>
        <tr>
            <td><?=$selecionados->getMarca();?></td>
            <td><?=$selecionados->getModelo();?></td>
            <td><?=$selecionados->getPlaca();?></td>
            <td><?=$selecionados->getAno();?></td>
            <td><?=$selecionados->getCor();?></td>
            <td><?=$selecionados->getPreco();?></td>

        </tr>
    </table>
    Dias de locação: <input id= "dias" type="number" name="dias" min="1" max="50" value="1" style="color: black;">
    <br>
    <input id= "preco" type="number" name="preco" hidden readonly value="<?= $selecionados->getPreco()?>" style="color: black;">
    <input id= "identificador" type="number" name="identificador" hidden value="<?= $selecionados->getId()?>" style="color: black;">
    <button type="submit" class="btn btn-success" onclick="valorTotal()" style="margin-top: 4%;">Confirmar Locação</button>

    <button class="btn btn-danger" style="margin-top: 4%;"><a href="../lista">Cancelar Locação</a></button>
</form>

</div>
<script>
    function valorTotal() {
        let dias = parseInt(document.getElementById("dias").value);
        let valor = <?= $selecionados->getPreco() ?>;
        let total = dias*valor;
        window.alert("Valor total: R$"+total);
    }
</script>