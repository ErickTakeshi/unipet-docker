<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Unipet',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home',    'url' => ['/site/index']],
            ['label' => 'Cliente', 'url' => ['/cliente/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Serviço', 'url' => ['/servico/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Especie', 'url' => ['/especie/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Raça',    'url' => ['/raca/index'],    'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Animal',  'url' => ['/animal/index'],  'visible' => !Yii::$app->user->isGuest],

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . \Yii::$app->session->get('nome') . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php
            foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
            }
        ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Unipet <?= date('Y') ?></p>

        <p class="pull-right">Equipe 2</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
