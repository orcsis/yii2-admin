<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\empresa\Osconfemp $model
 */

$this->title = Yii::t('admin', 'Update {modelClass}: ', [
    'modelClass' => 'Osconfemp',
]) . ' ' . $model->coe_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osconfemps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->coe_id, 'url' => ['view', 'id' => $model->coe_id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="osconfemp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
