<?php ?>
<h2 class="text-center">Registrar Novo Carro</h2>

<div class="col-12">
    <form action="<?= URL_RAIZ . 'locacao' ?>" style="margin-left: 10%;" class="col-sm-10" method="post" enctype="multipart/form-data">
        <div class="form-group <?= $this->getErroCss('carro') ?>">
            <input id="marca" required name="marca" style="margin-left: 30%;width: 40%" class="form-control" oninvalid="setCustomValidity('Favor digitar a marca do carro')" autofocus placeholder="Marca" value="<?= $this->getPost('marca') ?>">
            <br>
            <input id="modelo" required name="modelo" style="margin-left: 30%; width: 40%;" class="form-control" oninvalid="setCustomValidity('Favor digitar o modelo do carro!')" autofocus placeholder="Modelo" value="<?= $this->getPost('modelo') ?>" >

            <div style="margin-left: 30%; width: 40%;" class="form-group <?= $this->getErroCss('ano') ?>">
                <label class="control-label" for="ano"></label>
                <h5>Ano</h5>
                <select id="ano" oninvalid="setCustomValidity('Favor escolher o ano do carro')" required name="ano" class="form-control""  autofocus>
                <?php $selected = $this->getPost('ano')  ? 'selected' : '' ?>
                <option value="none" selected disabled hidden>
                    Selecione o Ano
                </option>
                <option value=2014>2010</option>
                <option value=2014>2011</option>
                <option value=2014>2012</option>
                <option value=2014>2013</option>
                <option value=2014>2014</option>
                <option value=2015>2015</option>
                <option value=2016>2016</option>
                <option value=2017>2017</option>
                <option value=2018>2018</option>
                <option value=2019>2019</option>
                <option value=2020>2020</option>
                </select>
            </div>
            <div style="margin-left: 30%; width: 40%;" class="form-group <?= $this->getErroCss('cor') ?>">
                <h5>Cor</h5>
                <select required id="cor" oninvalid="setCustomValidity('Favor escolher a cor do carro')" name="cor" class="form-control" autofocus>
                    <?php $selected = $this->getPost('cor')  ? 'selected' : '' ?>
                    <option value="none" selected disabled hidden>
                        Selecione a Cor
                    </option>
                    <option value="Branco">Branco</option>
                    <option value="Preto">Preto</option>
                    <option value="Vermelho">Vermelho</option>
                    <option value="Prata">Prata</option>
                    <option value="Azul">Azul</option>
                    <option value="Outro">Outra Cor</option>
                </select>
            </div>
            <br>
        </div>
        <div style="margin-left: 30%; width: 40%;" class="form-group <?= $this->getErroCss('preco') ?>">
            <label class="control-label" for="dificulty">Preço da Locação (Dia)</label>
            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'preco']) ?>
            <select required id="preco" name="preco" class="form-control" autofocus>
                <?php $selected = $this->getPost('preco')  ? 'selected' : '' ?>
                <option value=50>R$50</option>
                <option value=100>R$100</option>
                <option value=150>R$150</option>
                <option value=200>R$200</option>
                <option value=250>R$250</option>
                <option value=300>R$300</option>

            </select>
        </div>
        <div class="form-group <?= $this->getErroCss('placa') ?>" style="width: 15%; text-align: center; margin-left: 42%;">
         <label class="control-label" for="placa" >Placa do Carro</label>
        <?php $this->incluirVisao('util/formErro.php', ['campo' => 'placa']) ?>
        <input id="placa" name="placa" class="form-control" type="text" maxlength="7" required minlength="7" value="" oninvalid="setCustomValidity('Placa deve conter 7 dígitos')" placeholder="ABC1234">
</div>

<br>
<button type="submit" class="btn btn-success" style="margin-left: 45%;">Registrar Carro</button>

<?php $this->incluirVisao('util/formErro.php', ['campo' => 'marca']) ?>
<?php $this->incluirVisao('util/formErro.php', ['campo' => 'modelo']) ?>
<?php $this->incluirVisao('util/formErro.php', ['campo' => 'ano']) ?>
<?php $this->incluirVisao('util/formErro.php', ['campo' => 'cor']) ?>
<?php $this->incluirVisao('util/formErro.php', ['campo' => 'preco']) ?>
<?php $this->incluirVisao('util/formErro.php', ['campo' => 'placa']) ?>
</form>
</div>


<style>
    body{
        background-color: #2a5d84;
    }


</style>