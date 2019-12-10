<?php
if ($mensagemFlash) : ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $mensagemFlash ?>
    </div>
<?php endif ?>

<meta http-equiv="refresh" content="4;URL='<?= URL_RAIZ . 'login' ?>'" />
<div class="center-block site text-center">
    <h1>Pronto!</h1>
    <p>Login criado.</p>
    <p>Está sendo redirecionado.</p>
</div>
<style>
    div{
        color: black;
    }


</style>
