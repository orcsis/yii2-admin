<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Osempresas $model
 */

$this->title = Yii::t('admin', 'Update {modelClass}: ', [
    'modelClass' => 'Osempresas',
]) . ' ' . $model->emp_codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osempresas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->emp_codigo, 'url' => ['view', 'id' => $model->emp_codigo]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="osempresas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
