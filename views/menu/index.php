<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var orcsis\admin\models\searchs\Menu $searchModel
 */
$this->title = 'Menús';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Crear Menú', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'menuParent.men_nombre',
                'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                    'class' => 'form-control', 'men_id' => null
                ]),
                'label' => 'Padre'
            ],
            'men_nombre',
            'men_url',
            'men_orden',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    Pjax::end();
    ?>

</div>