<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Osopctab $model
 */

$this->title = Yii::t('admin', 'Update {modelClass}: ', [
    'modelClass' => 'Osopctab',
]) . ' ' . $model->opt_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osopctabs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->opt_id, 'url' => ['view', 'id' => $model->opt_id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="osopctab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
