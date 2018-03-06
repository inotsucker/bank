<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

class CustomerSearch extends Customer
{
    public $id;
    public $name;
    public $first_name;
    public $last_name;
    public $dob;

    public function search($params)
    {
        $query = Customer::find();

        // load the search form data and validate
        $this->load($params);

        // adjust the query by adding the filters
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'id', $this->id])
              ->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'first_name', $this->first_name])
              ->andFilterWhere(['like', 'last_name', $this->last_name])
              ->andFilterWhere(['like', 'dob', $this->dob]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}

?>