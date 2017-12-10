<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "raca".
 *
 * @property integer $id
 * @property string $descricao
 * @property string $observacao
 * @property integer $especie_id
 *
 * @property Animal[] $animals
 * @property Especie $especie
 */
class Raca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'raca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['especie_id'], 'integer'],
            [['descricao'], 'string', 'max' => 50],
            [['observacao'], 'string', 'max' => 200],
            [['especie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Especie::className(), 'targetAttribute' => ['especie_id' => 'id']],
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
            'especie_id' => Yii::t('app', 'Especie ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['raca_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspecie()
    {
        return $this->hasOne(Especie::className(), ['id' => 'especie_id']);
    }
}
