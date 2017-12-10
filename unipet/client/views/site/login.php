<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\authclient;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="col-md-6 text-center auth-buttons" style="text-align: center;">
        <h1 class="title-page"> Faça seu login usando: </h1>
        <?= yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth']]) ?>
    </div>

</div>
