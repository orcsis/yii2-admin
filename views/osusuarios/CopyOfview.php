<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Osusuarios $model
 */

$this->title = $model->usu_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osusuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->usu_nomusu;
?>
<div class="osusuarios-view">
    <!--<div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>-->


    <?= DetailView::widget([
            'model' => $model,
            'condensed'=>false,
            'hover'=>true,
            'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
            'panel'=>[
            	'heading'=>$this->title,
            	'type'=>DetailView::TYPE_INFO,
        	],
        'attributes' => [
            //'usu_id',
            [
            	'attribute'=>'uploadedFile',
            	'format'=>'raw',
            	'value'=>$model->usu_type ?
            		'<a href="#" class="thumbnail">
                        <img src="data:'.$model->usu_type.';base64,'.base64_encode($model->usu_foto).'" alt="" class="">
                    </a>' :
            		'<a href="#" class="thumbnail">
                        <img src="'.Yii::$app->params['assetUrl'].'images/noavatar_man.png" alt="" class="">
                    </a>',
            	'type'=>DetailView::INPUT_FILE
            ],
            'usu_nomusu',
            'usu_nombre',
            /*[
              'attribute' => 'usu_clave',
                'type'=>DetailView::INPUT_PASSWORD,
            ],*/
            [
                'attribute'=>'usu_feccre',
                'format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A'],
                'type'=>DetailView::INPUT_WIDGET,
                'widgetOptions'=> [
                    'class'=>DateControl::classname(),
                    'type'=>DateControl::FORMAT_DATETIME
                ]
            ],
            [
                'attribute'=>'usu_ulting',
                'format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A'],
                'type'=>DetailView::INPUT_WIDGET,
                'widgetOptions'=> [
                    'class'=>DateControl::classname(),
                    'type'=>DateControl::FORMAT_DATETIME
                ]
            ],
            [
            	'attribute'=>'usu_activo',
            	'format'=>'raw',
            	'value'=>$model->usu_activo ?
            		'<span class="label label-success">Activo</span>' :
            		'<span class="label label-danger">Inactivo</span>',
            	'type'=>DetailView::INPUT_SWITCH
            ],
            //'usu_token',
            'usu_ultemp',
            //'usu_foto',
            //'usu_name',
            //'usu_type',
            //'usu_size',
        ],
        'deleteOptions'=>[
        'url'=>['delete', 'id' => $model->usu_id],
        'data'=>[
        'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'),
        'method'=>'post',
        ],
        ],
        'enableEditMode'=>true,
    ]) ?>

</div>
