<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Osempresas $model
 */

$this->title = $model->emp_codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osempresas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osempresas-view">
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
            'emp_codigo',
            'emp_nombre',
            'emp_datos',
            'emp_estado',
        ],
        'deleteOptions'=>[
        'url'=>['delete', 'id' => $model->emp_codigo],
        'data'=>[
        'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'),
        'method'=>'post',
        ],
        ],
        'enableEditMode'=>true,
    ]) ?>

</div>
