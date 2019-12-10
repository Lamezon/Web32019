<?php
$mensagemFlash = \Framework\DW3Sessao::getFlash('mensagemFlash');
if ($mensagemFlash) : ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $mensagemFlash ?>
    </div>
<?php endif ?>
<center>
<h3>Carro Devolvido</h3>
    <h2>O carro já foi disponibilizado para novas locações!</h2>
    <button class="btn btn-success" style="margin-top: 4%;"><a href="../../../lista" methods="get">Confirmar</a></button>
</center>