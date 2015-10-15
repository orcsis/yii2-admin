<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\empresa\Osconfemp $model
 */

$this->title = Yii::t('admin', 'Create {modelClass}', [
    'modelClass' => 'Osconfemp',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osconfemps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osconfemp-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
