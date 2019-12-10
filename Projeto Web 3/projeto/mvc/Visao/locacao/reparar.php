<?php

?>


<h3><center>Relatório de reparos</center></h3>
<form action="<?= URL_RAIZ . 'carros/relatorio' ?>" method="post" enctype="multipart/form-data">
    <div style="margin-top: 2%; margin-left: 23%;">

        <h2>Informações do Carro</h2>
        <table class="table table-striped table-dark" style="width: 70%; background-color: lightgray; color: black;">
            <tr>
                <th id="tableHeader">Marca</th>
                <th id="tableHeader">Modelo</th>
                <th id="tableHeader">Placa</th>
                <th id="tableHeader">Cor</th>
            </tr>
            <tr>
                <td><?=$selecionados->getMarca();?></td>
                <td><?=$selecionados->getModelo();?></td>
                <td><?=$selecionados->getPlaca();?></td>
                <td><?=$selecionados->getCor();?></td>

            </tr>
        </table>
        <h2>Informações do Reparo</h2>
        <table class="table table-striped table-dark" style="width: 70%; background-color: lightgray; color: black;">
            <tr>
                <th id="tableHeader">Problema</th>
                <th id="tableHeader">Tempo de Reparo</th>
                <th id="tableHeader">Custo (R$)</th>
            </tr>
            <tr>
                <td>Nome do Problema</td>
                <td><?= rand(1,7) ?> dias</td>
                <td> <input id= "preco" type="number" name="preco" readonly value="<?= rand(100,2000) ?>" style="color: black;  -webkit-appearance: none; margin:0; -moz-appearance:textfield;"></td>

            </tr>
        </table>
        <button type="submit" class="btn btn-success" style="margin-top: 4%;">Confirmar Pagamento</button>
        <input id= "identificador" type="number" name="identificador" hidden value="<?= $selecionados->getId()?>" style="color: black;">
</form>

</div>
<script>

</script>