<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "especie".
 *
 * @property integer $id
 * @property string $descricao
 * @property string $observacao
 *
 * @property Animal[] $animals
 * @property Raca[] $racas
 */
class Especie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'especie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['especie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRacas()
    {
        return $this->hasMany(Raca::className(), ['especie_id' => 'id']);
    }
}
