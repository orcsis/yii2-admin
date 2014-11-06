<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\builder\TabularForm;
use kartik\widgets\FileInput;

/**
 * @var yii\web\View $this
 * @var common\models\Osusuarios $model
 * @var yii\widgets\ActiveForm $form
 */
$model->usu_activo = $model->isNewRecord ? 1 : $model->usu_activo;
?>
<div class="osusuarios-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL,'options' => ['enctype' => 'multipart/form-data']]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'usu_nomusu'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre de Usuario...', 'maxlength'=>64]], 

//'usu_feccre'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATETIME]], 

//'usu_ulting'=>['type'=> Form::INPUT_WIDGET, 'widgetClass'=>DateControl::classname(),'options'=>['type'=>DateControl::FORMAT_DATETIME]], 

'usu_activo'=>['type'=> Form::INPUT_CHECKBOX, 'options'=>['placeholder'=>'Estado del Usuario...']], 

//'usu_foto'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Fotografía del Usuario...']], 

//'uploadedFile'=>['type'=> Form::INPUT_FILE, 'options'=>['placeholder'=>'Fotografía...']], 

'usu_nombre'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre Completo del Usuario...', 'maxlength'=>64]], 

'usu_clave'=>['type'=> Form::INPUT_PASSWORD, 'options'=>['placeholder'=>'Contraseña...', 'maxlength'=>64]]

//'usu_name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Nombre de la Fotografía...', 'maxlength'=>64]], 

//'usu_type'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Tipo de Archivo...', 'maxlength'=>64]], 

//'usu_size'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Tamaño del Archivo...', 'maxlength'=>64]], 

//'usu_token'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Token de autenticación API...', 'maxlength'=>45]], 

//'usu_ultemp'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Última Empresa ingresada...', 'maxlength'=>45]], 

    ]


    ]);
    
    echo $form->field($model, 'uploadedFile')->widget(FileInput::classname(), [
    'pluginOptions' => [
    	'showCaption' => false,
    	'showRemove' => false,
    	'showUpload' => false,
    	'browseClass'=> 'btn btn-primary btn-block',
    	'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
    	'browseLabel' =>  Yii::t('admin','Select Photo')
    ],
    'options' => ['accept' => 'image/*'],
    ]);
    
    echo Html::submitButton($model->isNewRecord ? Yii::t('yii','Create') : Yii::t('yii','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>
