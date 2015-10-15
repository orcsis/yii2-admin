<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var common\models\Osopctab $model
 */

$this->title = $model->opt_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Osopctabs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osopctab-view">
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
            'opt_id',
            'opt_tabla',
            'opt_campo',
            'opt_opcion',
            'opt_descri',
        ],
        'deleteOptions'=>[
        'url'=>['delete', 'id' => $model->opt_id],
        'data'=>[
        'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'),
        'method'=>'post',
        ],
        ],
        'enableEditMode'=>true,
    ]) ?>

</div>
