<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Alterando especie: ' . $especie[0]["descricao"]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index row">

    <h1 class="col-md-12"><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12">
        <form method="post" action="http://localhost/unipet-server/index.php/sync/especie">
            <input type="hidden" name="_method" value="put" />
            <input hidden id="id" name="id" value="<?= $especie[0]['id'] ?>">
            <div class="col-md-7 no-clear" style="margin-top: 5px">
                <label class="control-label" for="descricao">Descrição</label>
                <input class="form-control" name="descricao" id="descricao" value="<?= $especie[0]['descricao'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="observacao">Observação</label>
                <input class="form-control" name="observacao" id="observacao" value="<?= $especie[0]['observacao'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
