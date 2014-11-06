<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Osusuarios $model
 */

$this->title = Yii::t('admin', 'Create Osusuarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osusuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osusuarios-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
