<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\searchs\Osempresas $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osempresas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'emp_codigo') ?>

    <?= $form->field($model, 'emp_nombre') ?>

    <?= $form->field($model, 'emp_datos') ?>

    <?= $form->field($model, 'emp_estado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('admin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
