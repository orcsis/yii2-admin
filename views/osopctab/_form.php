<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Osopctab $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osopctab-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'opt_opcion'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Opción...']], 

'opt_tabla'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Tabla...', 'maxlength'=>45]], 

'opt_campo'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Campo...', 'maxlength'=>45]], 

'opt_descri'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Descripción...', 'maxlength'=>60]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
