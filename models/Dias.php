<?php

namespace app\models;

/**
 * This is the model class for table "dias".
 *
 * @property int $id
 * @property string $dia
 *
 * @property Clases[] $clases
 * @property Entrenamientos[] $entrenamientos
 * @property Horarios[] $horarios
 * @property Rutinas[] $rutinas
 */
class Dias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dia'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dia' => 'Dia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClases()
    {
        return $this->hasMany(Clases::className(), ['dia' => 'id'])->inverseOf('diaClase');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrenamientos()
    {
        return $this->hasMany(Entrenamientos::className(), ['dia' => 'id'])->inverseOf('diaSemana');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horarios::className(), ['dia' => 'id'])->inverseOf('nombreDia');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEjercicios()
    {
        return $this->hasMany(Ejercicios::className(), ['dia_id' => 'id'])->inverseOf('dia');
    }
}
