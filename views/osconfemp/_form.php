<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;

/**
 * @var yii\web\View $this
 * @var common\models\empresa\Osconfemp $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osconfemp-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [
    	'coe_nombre'=>['type'=> Form::INPUT_WIDGET,
    				   'widgetClass' => '\yii\widgets\MaskedInput',
    				   'options'=>[
    				   		'mask'=> 'A{3,10}9{0,5}'
    				   	]
    	],
    	'coe_descri'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Descripción...', 'maxlength'=>60]],

'coe_tipo'=>[
		'type'=> Form::INPUT_WIDGET,
		'widgetClass' => Select2::classname(),
		'options'=>[
			'data' => Yii::$app->orcsis->getOpcTab($model->tableName(),'coe_tipo'),
			'options' => [
				'placeholder'=>'Enter Tipo de Dato...',
			],
		],
], 

'coe_data'=>['type'=> Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Enter Coe Data...','rows'=> 6]],   

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
