<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\searchs\Osusuarios $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osusuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usu_id') ?>

    <?= $form->field($model, 'usu_nomusu') ?>

    <?= $form->field($model, 'usu_nombre') ?>

    <?= $form->field($model, 'usu_clave') ?>

    <?= $form->field($model, 'usu_feccre') ?>

    <?php // echo $form->field($model, 'usu_ulting') ?>

    <?php // echo $form->field($model, 'usu_activo') ?>

    <?php // echo $form->field($model, 'usu_token') ?>

    <?php // echo $form->field($model, 'usu_ultemp') ?>

    <?php // echo $form->field($model, 'usu_foto') ?>

    <?php // echo $form->field($model, 'usu_name') ?>

    <?php // echo $form->field($model, 'usu_type') ?>

    <?php // echo $form->field($model, 'usu_size') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('admin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
