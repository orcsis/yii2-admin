<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\empresa\Osconfemp $model
 */

$this->title = $model->coe_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osconfemps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osconfemp-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
            'model' => $model,
            'condensed'=>false,
            'hover'=>true,
            'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
            'panel'=>[
            'heading'=>$this->title,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'coe_id',
            'coe_nombre',
            'coe_descri',
            'coe_tipo',
            'coe_data:ntext',
        ],
        'deleteOptions'=>[
        'url'=>['delete', 'id' => $model->coe_id],
        'data'=>[
        'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'),
        'method'=>'post',
        ],
        ],
        'enableEditMode'=>true,
    ]) ?>

</div>
