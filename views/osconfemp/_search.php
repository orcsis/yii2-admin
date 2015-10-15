<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\empresa\searchs\Osconfemp $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osconfemp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'coe_id') ?>

    <?= $form->field($model, 'coe_nombre') ?>

    <?= $form->field($model, 'coe_descri') ?>

    <?= $form->field($model, 'coe_tipo') ?>

    <?= $form->field($model, 'coe_data') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('admin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
