<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servico".
 *
 * @property integer $id
 * @property string $descricao
 * @property string $observacao
 * @property string $ativo
 */
class Servico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ativo'], 'string'],
            [['descricao'], 'string', 'max' => 50],
            [['observacao'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descricao' => Yii::t('app', 'Descricao'),
            'observacao' => Yii::t('app', 'Observacao'),
            'ativo' => Yii::t('app', 'Ativo'),
        ];
    }
}
