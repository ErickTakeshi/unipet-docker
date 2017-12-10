<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Alterar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Excluir'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Tem certeza de que deseja excluir este item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'cpf',
            'email:email',
            'rg',
            ['attribute' => 'datanasc',
                'value' => $model->datanasc,
                'format' => ['date', 'php:d/m/Y'],
            ],
            'sexo',
            'telefone',
        ],
    ]) ?>

</div>
