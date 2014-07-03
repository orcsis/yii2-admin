<?php

namespace orcsis\admin\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use orcsis\admin\models\Menu as MenuModel;

/**
 * Menu represents the model behind the search form about `orcsis\admin\models\Menu`.
 */
class Menu extends MenuModel
{

    public function rules()
    {
        return [
            [['men_id', 'men_parent', 'men_orden'], 'integer'],
            [['men_nombre', 'men_url', 'parent_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = MenuModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $query->leftJoin(['men_parent' => 'osmenu'], 'osmenu.men_parent=men_parent.men_id');
        $sort = $dataProvider->getSort();
        $sort->attributes['menuParent.men_nombre'] = [
            'asc' => ['men_parent.men_nombre' => SORT_ASC],
            'desc' => ['men_parent.men_nombre' => SORT_DESC],
            'label' => 'men_parent',
        ];

        $sort->attributes['men_orden'] = [
            'asc' => ['men_parent.men_orden' => SORT_ASC, 'osmenu.men_orden' => SORT_ASC],
            'desc' => ['men_parent.men_orden' => SORT_DESC, 'osmenu.men_orden' => SORT_DESC],
            'label' => 'men_orden',
        ];
        $sort->defaultOrder = ['menuParent.men_nombre' => SORT_ASC];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'men_id' => $this->men_id,
            'men_parent' => $this->men_parent,
        ]);

        $query->andFilterWhere(['like', 'men_nombre', $this->men_nombre])
            ->andFilterWhere(['like', 'men_url', $this->men_url])
            ->andFilterWhere(['like', 'men_parent.men_nombre', $this->parent_name]);


        return $dataProvider;
    }
}