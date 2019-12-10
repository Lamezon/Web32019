<div class="center-block site">
    <div class="col-sm-6 col-sm-offset-3">
        <h1 class="text-center">Criar login</h1>
        <form action="<?= URL_RAIZ . 'usuarios' ?>" method="post" class="margin-bottom" enctype="multipart/form-data">
            <div class="form-group <?= $this->getErroCss('login') ?>">
                <label class="control-label" for="login">Usuario*</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'login']) ?>
                <input id="login" name="login" class="form-control" autofocus value="<?= $this->getPost('login') ?>">
            </div>
            <div class="form-group <?= $this->getErroCss('password') ?>">
                <label class="control-label" for="password">Senha*</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'password']) ?>
                <input id="password" name="password" class="form-control" type="password">
            </div>
            <div class="form-group <?= $this->getErroCss('password2') ?>">
                <label class="control-label" for="password2">Reinsira a senha*</label>
                <?php $this->incluirVisao('util/formErro.php', ['campo' => 'password2']) ?>
                <input id="password2" name="password2" class="form-control" type="password">
            </div>
            <button type="submit" class="btn btn-primary center-block">Criar Conta!</button>
        </form>
        <p class="text-center">
            <a href="<?= URL_RAIZ . 'login' ?>">Voltar</a>
        <p class="text-danger"> *Campos Necessários  </p>
        </p>
    </div>

</div>
