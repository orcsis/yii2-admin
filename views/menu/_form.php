<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use orcsis\admin\components\AccessHelper;
use orcsis\admin\models\Menu;

/**
 * @var yii\web\View $this
 * @var orcsis\admin\models\Menu $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'men_nombre')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'parent_name')->widget(AutoComplete::className(),[
        'options'=>['class'=>'form-control'],
        'clientOptions'=>[
            'source'=>  Menu::find()->select(['men_nombre'])->column()
        ]
    ]) ?>

    <?= $form->field($model, 'men_url')->widget(AutoComplete::className(),[
        'options'=>['class'=>'form-control'],
        'clientOptions'=>[
            'source'=>  AccessHelper::getSavedRoutes()
        ]
    ]) ?>

    <?= $form->field($model, 'men_orden')->input('number') ?>

    <?= $form->field($model, 'men_data')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>