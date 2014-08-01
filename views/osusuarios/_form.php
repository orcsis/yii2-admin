<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\builder\TabularForm;

/**
 * @var yii\web\View $this
 * @var common\models\Osusuarios $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osusuarios-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'usu_nomusu'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nombre de Usuario (id)...', 'maxlength'=>64]], 

'usu_feccre'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATETIME]], 

'usu_ulting'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATETIME]], 

'usu_activo'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Estado del Usuario...']], 

'usu_foto'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Fotografía del Usuario...']], 

'uploadedFile'=>['type'=> TabularForm::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Archivo...']], 

'usu_nombre'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nombre Completo del Usuario...', 'maxlength'=>64]], 

'usu_clave'=>['type'=> Form::INPUT_PASSWORD, 'options'=>['placeholder'=>'Enter Contraseña...', 'maxlength'=>64]],

'usu_name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nombre de la Fotografía...', 'maxlength'=>64]], 

'usu_type'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Tipo de Archivo...', 'maxlength'=>64]], 

'usu_size'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Tamaño del Archivo...', 'maxlength'=>64]], 

'usu_token'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Token de autenticación API...', 'maxlength'=>45]], 

'usu_ultemp'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Última Empresa ingresada...', 'maxlength'=>45]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
