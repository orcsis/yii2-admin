<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Osopctab $model
 */

$this->title = Yii::t('admin', 'Create {modelClass}', [
    'modelClass' => 'Osopctab',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osopctabs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osopctab-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
