<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property integer $id
 * @property string $sexo
 * @property integer $especie_id
 * @property integer $raca_id
 * @property integer $cliente_id
 * @property string $nome
 *
 * @property Cliente $cliente
 * @property Especie $especie
 * @property Raca $raca
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sexo', 'raca_id', 'cliente_id', 'nome'], 'required'],
            [['sexo'], 'string'],
            [['raca_id', 'cliente_id'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['raca_id'], 'exist', 'skipOnError' => true, 'targetClass' => Raca::className(), 'targetAttribute' => ['raca_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sexo' => Yii::t('app', 'Sexo'),
            'raca_id' => Yii::t('app', 'Raca ID'),
            'cliente_id' => Yii::t('app', 'Cliente ID'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaca()
    {
        return $this->hasOne(Raca::className(), ['id' => 'raca_id']);
    }
}
