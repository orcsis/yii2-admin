<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\searchs\Osusuarios $searchModel
 */

$this->title = Yii::t('admin', 'Osusuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osusuarios-index">
    <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a(Yii::t('admin', 'Create {modelClass}', [
    'modelClass' => 'Osusuarios',
]), ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'usu_id',
            [
            	'attribute'=>'usu_nomusu',
            	'vAlign'=>'middle',
            	'value'=>function ($model, $key, $index, $widget) {
            		return Html::a($model->usu_nomusu, Yii::$app->urlManager->createUrl(['admin/osusuarios/view','id' => $model->usu_id]));
            	},
            	'format'=>'raw'
            ],
            'usu_nombre',
            //'usu_clave',
            ['attribute'=>'usu_feccre','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']],
            ['attribute'=>'usu_ulting','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']], 
            [
    			'class'=>'kartik\grid\BooleanColumn',
    			'attribute'=>'usu_activo', 
    			'vAlign'=>'middle',
			], 
//            'usu_token', 
//            'usu_ultemp', 
//            'usu_foto', 
//            'usu_name', 
//            'usu_type', 
//            'usu_size', 

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['admin/osusuarios/view','id' => $model->usu_id,'edit'=>'t']), [
                                                    'title' => Yii::t('yii', 'Edit'),
                                                  ]);}

                ],
            ],
        ],
        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,
        //'showPageSummary' => true,




        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type'=>'info',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('admin','Add'), ['create'], ['class' => 'btn btn-success']),                                                                                                                                                          'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> '.Yii::t('admin','Reset List'), ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
    ]); ?>

</div>
