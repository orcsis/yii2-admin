<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Osusuarios $model
 */

$this->title = Yii::t('admin', 'Update {modelClass}: ', [
    'modelClass' => 'Osusuarios',
]) . ' ' . $model->usu_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osusuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usu_id, 'url' => ['view', 'id' => $model->usu_id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="osusuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
