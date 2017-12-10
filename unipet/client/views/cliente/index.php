<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-index row">

    <h1 class="col-md-12"><?= Html::encode($this->title) ?></h1>

    <p class="col-md-12">
        <?= Html::a(Yii::t('app', 'Incluir'), ['incluir'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="col-md-12">
        <?php
            $i = 0;
            echo '<table class="table table-hover table-striped table-condensed">' .
                 '<thead>'.
                 '<tr>'.
                 '<th>Nome</th>'.
                 '<th>CPF</th>'.
                 '<th>Sexo</th>'.
                 '<th>E-mail</th>'.
                 '<th>Ações</th>'.
                 '</tr>'.
                 '</thead><tbody>';
            while($i < sizeof($clientes)){
                echo '<tr>'.
                     '<td>'.$clientes[$i]['nome'].'</td>'.
                     '<td>'.$clientes[$i]['cpf'].'</td>'.
                     '<td>'.$clientes[$i]['sexo'].'</td>'.
                     '<td>'.$clientes[$i]['email'].'</td>'.
                     '<td>'.Html::a('', ['cliente/update', 'id' => $clientes[$i]['id']], ['class' => 'glyphicon glyphicon-pencil', 'title' => 'Alterar',
                                                                                          'aria-label' => 'Alterar', 'data-pjax' => '0',
                                                                                          'style' => 'text-decoration : none;']).' '
                           .Html::a('', ['cliente/delete', 'id' => $clientes[$i]['id']], ['class' => 'glyphicon glyphicon-trash', 'title' => 'Excluir',
                                                                                          'aria-label' => 'Excluir', 'data-pjax' => '0',
                                                                                          'style' => 'text-decoration : none;']).'</td>'.
                     '</tr>';

                $clientes[$i]['nome'];
                $i++;
            }
            echo '</tbody></table>';
        ?>
    </div>
</div>
