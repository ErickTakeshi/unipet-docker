<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Incluindo serviço: ');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index row">

    <h1 class="col-md-12"><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12">
        <form method="post" action="http://localhost/unipet-server/index.php/sync/servico">
            <div class="col-md-7 no-clear" style="margin-top: 5px">
                <label class="control-label" for="descricao">Descrição</label>
                <input class="form-control" name="descricao" id="descricao" required>
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="observacao">Observação</label>
                <input class="form-control" name="observacao" id="observacao">
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="ativo">Sexo</label>
                <select id="ativo" class="form-control" name="ativo">
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
