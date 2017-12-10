<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nome
 * @property string $cpf
 * @property string $email
 * @property string $rg
 * @property string $datanasc
 * @property string $sexo
 * @property string $telefone
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datanasc'], 'safe'],
            [['sexo'], 'string'],
            [['nome', 'email'], 'string', 'max' => 50],
            [['cpf', 'rg'], 'string', 'max' => 15],
            [['telefone'], 'string', 'max' => 25],
            [['nome'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'  => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
            'cpf' => Yii::t('app', 'CPF'),
            'email' => Yii::t('app', 'E-mail'),
            'rg' => Yii::t('app', 'RG'),
            'datanasc' => Yii::t('app', 'Data de nascimento'),
            'sexo' => Yii::t('app', 'Sexo'),
            'telefone' => Yii::t('app', 'Telefone'),
        ];
    }
}
