<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Alterando animal: ' . $animal[0]["nome"]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index row">

    <h1 class="col-md-12"><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12">
        <form method="post" action="http://localhost/unipet-server/index.php/sync/animal">
            <input type="hidden" name="_method" value="put" />
            <input hidden id="id" name="id" value="<?= $animal[0]['id'] ?>">

            <div class="col-md-7 no-clear" style="margin-top: 5px">
                <label class="control-label" for="nome">Nome</label>
                <input class="form-control" name="nome" id="nome" value="<?= $animal[0]['nome'] ?>" >
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="sexo">Sexo</label>
                <select id="sexo" class="form-control" name="sexo" value="<?= $animal[0]['sexo'] ?>">
                    <option value="Macho">Macho</option>
                    <option value="Fêmea">Fêmea</option>
                </select>
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="raca_id">Raça</label>
                <select id="raca_id" class="form-control" name="raca_id" value="<?= $animal[0]['raca_id'] ?>">
                    <option value=""></option>
                    <?php
                        $i = 0;
                        while($i < sizeof($racas)){
                            echo '<option value="' . $racas[$i]['id'] . '">' .
                                 $racas[$i]['descricao'] . '</option>';
                            $i++;
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <label class="control-label" for="cliente_id">Cliente</label>
                <select id="cliente_id" class="form-control" name="cliente_id" value="<?= $animal[0]['cliente_id'] ?>">
                    <option value=""></option>
                    <?php
                        $i = 0;
                        while($i < sizeof($clientes)){
                            echo '<option value="' . $clientes[$i]['id'] . '">' .
                                 $clientes[$i]['nome'] . '</option>';
                            $i++;
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-7 no-clear" style="margin-top: 18px">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
