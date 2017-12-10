<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome', ['options' => ['class' => 'form-group col-md-7']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf', ['options' => ['class' => 'form-group col-md-7']])->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '999.999.999-99',
        ]) ?>

    <?= $form->field($model, 'email', ['options' => ['class' => 'form-group col-md-7']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rg', ['options' => ['class' => 'form-group col-md-7']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datanasc', ['options' => ['class' => 'form-group col-md-7']])->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'sexo', ['options' => ['class' => 'form-group col-md-7']])->dropDownList([ 'Masculino' => 'Masculino', 'Feminino' => 'Feminino', 'Indeterminado' => 'Indeterminado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'telefone', ['options' => ['class' => 'form-group col-md-7']])->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '(99) 9999-9999',
        ]) ?>

    <div class="form-group col-md-12">
        <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', Yii::$app->request->referrer, ['class'=>'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
