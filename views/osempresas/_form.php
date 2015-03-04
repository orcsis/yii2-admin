<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Osempresas $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osempresas-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'emp_estado'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Activo...']], 

'emp_nombre'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nombre de Empresa...', 'maxlength'=>50]], 

'emp_datos'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Base de Datos de la Empresa...', 'maxlength'=>20]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
