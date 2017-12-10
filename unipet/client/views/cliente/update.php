<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Alterando cliente: ' . $cliente[0]["nome"]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index row">

    <h1 class="col-md-12"><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12">
        <form method="post" action="http://localhost/unipet-server/index.php/sync/cliente">
            <input type="hidden" name="_method" value="put" />
            <input hidden id="id" name="id" value="<?= $cliente[0]['id'] ?>">
            <div class="col-md-7 no-clear" style="margin-top: 5px">
                <label class="control-label" for="nome">Nome</label>
                <input class="form-control" name="nome" id="nome" value="<?= $cliente[0]['nome'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="cpf">CPF</label>
                <input class="form-control" name="cpf" id="cpf" value="<?= $cliente[0]['cpf'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" value="<?= $cliente[0]['email'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="rg">RG</label>
                <input class="form-control" name="rg" id="rg" value="<?= $cliente[0]['rg'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="datanasc">Data Nascimento</label>
                <input type="date" name="datanasc" class="form-control" id="datanasc" value="<?= $cliente[0]['datanasc'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="sexo">Sexo</label>
                <select id="sexo" class="form-control" name="sexo" value="<?= $cliente[0]['sexo'] ?>">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Indetermindao">Indetermindao</option>
                </select>
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="telefone">Telefone</label>
                <input class="form-control" name="telefone" id="telefone" value="<?= $cliente[0]['telefone'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
