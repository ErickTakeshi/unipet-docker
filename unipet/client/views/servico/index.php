<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Serviços');
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
                 '<th>Descrição</th>'.
                 '<th>Ativo</th>'.
                 '<th>Ações</th>'.
                 '</tr>'.
                 '</thead><tbody>';
            while($i < sizeof($servicos)){
                echo '<tr>'.
                     '<td>'.$servicos[$i]['descricao'].'</td>'.
                     '<td>'.$servicos[$i]['ativo'].'</td>'.
                     '<td>'.Html::a('', ['servico/update', 'id' => $servicos[$i]['id']], ['class' => 'glyphicon glyphicon-pencil', 'title' => 'Alterar',
                                                                                          'aria-label' => 'Alterar', 'data-pjax' => '0',
                                                                                          'style' => 'text-decoration : none;']).' '
                           .Html::a('', ['servico/delete', 'id' => $servicos[$i]['id']], ['class' => 'glyphicon glyphicon-trash', 'title' => 'Excluir',
                                                                                          'aria-label' => 'Excluir', 'data-pjax' => '0',
                                                                                          'style' => 'text-decoration : none;']).'</td>'.
                     '</tr>';

                $i++;
            }
            echo '</tbody></table>';
        ?>
    </div>
</div>
