<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\searchs\Osopctab $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="osopctab-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'opt_id') ?>

    <?= $form->field($model, 'opt_tabla') ?>

    <?= $form->field($model, 'opt_campo') ?>

    <?= $form->field($model, 'opt_opcion') ?>

    <?= $form->field($model, 'opt_descri') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('admin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
