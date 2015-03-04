<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Osempresas $model
 */

$this->title = Yii::t('admin', 'Create {modelClass}', [
    'modelClass' => 'Osempresas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osempresas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osempresas-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
