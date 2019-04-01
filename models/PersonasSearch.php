<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personas;

/**
 * PersonasSearch represents the model behind the search form of `app\models\Personas`.
 */
class PersonasSearch extends Personas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'peso', 'altura', 'tarifa', 'monitor'], 'integer'],
            [['nombre', 'email', 'contrasena', 'fecha_nac', 'foto', 'fecha_alta', 'tipo', 'horario_entrada', 'horario_salida', 'especialidad'], 'safe'],
            [['telefono'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Personas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_nac' => $this->fecha_nac,
            'peso' => $this->peso,
            'altura' => $this->altura,
            'telefono' => $this->telefono,
            'tarifa' => $this->tarifa,
            'fecha_alta' => $this->fecha_alta,
            'monitor' => $this->monitor,
            'horario_entrada' => $this->horario_entrada,
            'horario_salida' => $this->horario_salida,
        ]);

        $query->andFilterWhere(['ilike', 'nombre', $this->nombre])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'contrasena', $this->contrasena])
            ->andFilterWhere(['ilike', 'foto', $this->foto])
            ->andFilterWhere(['ilike', 'tipo', $this->tipo])
            ->andFilterWhere(['ilike', 'especialidad', $this->especialidad]);

        return $dataProvider;
    }
}