<?php

namespace orcsis\admin\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use orcsis\admin\models\Menu as MenuModel;

/**
 * Menu represents the model behind the search form about [[\orcsis\admin\models\Menu]].
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Menu extends MenuModel
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['men_id', 'men_parent', 'men_orden'], 'integer'],
            [['men_nombre', 'men_url', 'parent_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Searching menu
     * @param  array $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = MenuModel::find()
            ->from(MenuModel::tableName() . ' t')
            ->joinWith(['menuParent' => function ($q) {
            $q->from(MenuModel::tableName() . ' men_parent');
        }]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $sort = $dataProvider->getSort();
        $sort->attributes['menuParent.men_nombre'] = [
            'asc' => ['men_parent.men_nombre' => SORT_ASC],
            'desc' => ['men_parent.men_nombre' => SORT_DESC],
            'label' => 'men_parent',
        ];
        $sort->attributes['men_orden'] = [
            'asc' => ['men_parent.men_orden' => SORT_ASC, 't.men_orden' => SORT_ASC],
            'desc' => ['men_parent.men_orden' => SORT_DESC, 't.men_orden' => SORT_DESC],
            'label' => 'men_orden',
        ];
        $sort->defaultOrder = ['menuParent.men_nombre' => SORT_ASC];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            't.men_id' => $this->id,
            't.men_parent' => $this->men_parent,
        ]);

        $query->andFilterWhere(['like', 'lower(t.men_nnombre)', strtolower($this->men_nombre)])
            ->andFilterWhere(['like', 't.men_url', $this->men_url])
            ->andFilterWhere(['like', 'lower(men_parent.men_nombre)', strtolower($this->parent_name)]);

        return $dataProvider;
    }
}
