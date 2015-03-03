<?php

use yii\helpers\Html;
use orcsis\widgets\DetailView;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
use kartik\icons\Icon;
use kartik\popover\PopoverX;
use kartik\password\PasswordInput;

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
        	'formOptions' => [
        		'options' => ['enctype' => 'multipart/form-data']
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
            	'type'=>DetailView::INPUT_WIDGET,
            	'widgetOptions'=> [
                    'class'=>FileInput::classname(),
    				'pluginOptions' => [
    					'showCaption' => false,
    					'showRemove' => false,
    					'showUpload' => false,
    					'browseClass'=> 'btn btn-primary btn-block',
    					'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
    					'browseLabel' =>  Yii::t('admin','Select Photo')
    				],
    				'options' => ['accept' => 'image/*'],	
                ]
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
                'displayOnly'=> true,
                'widgetOptions'=> [
                    'class'=>DateControl::classname(),
                    'type'=>DateControl::FORMAT_DATETIME
                ]
            ],
            [
                'attribute'=>'usu_ulting',
                'format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A'],
                'type'=>DetailView::INPUT_WIDGET,
                'displayOnly'=> true,
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
            [
            	'attribute'=>'usu_ultemp',
            	'displayOnly'=>true
            ],
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
        'buttons'=>[
        	[
        		'label'=>Icon::show('key'),
        		'title'=>Yii::t('admin','Change Password'),
                'html' => PopoverX::widget([
                    'header' => '<i class="glyphicon glyphicon-lock"></i> ' . Yii::t('admin','Change Password'),
                    'placement' => PopoverX::ALIGN_BOTTOM_RIGHT,
                    'size' => PopoverX::SIZE_LARGE,
                    'footer'=>Html::submitButton(Yii::t('admin','Enviar'), ['class'=>'btn btn-sm btn-primary']),
                    'content' => '<label class="control-label">'.Yii::t('admin','Password').'</label>' . PasswordInput::widget(['model' => $model,'attribute' => 'passwd']),
                    'toggleButton' => ['label'=>Icon::show('key'), 'class'=>'btn btn-xs btn-info'],
                ])
        		
        	]
        ]
    ]) ?>

</div>
