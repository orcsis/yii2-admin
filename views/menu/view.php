<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\Menu $model
 */

$this->title = $model->men_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Menús', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->men_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->men_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que desea borrar este Item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'menuParent.men_nombre:text:Parent',
            'men_nombre',
            'men_url',
            'men_orden',
        ],
    ]) ?>

</div>
