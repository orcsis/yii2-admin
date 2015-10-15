<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\Osempresas $model
 */
$this->title = Yii::t('app','Seleccione Empresa');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Selecciones Empresa</h3>
				</div>
				<div class="panel-body">
					<?php
						$form = ActiveForm::begin();
						echo $form->field($model, 'state_1')->widget(Select2::classname(), [
    						'data' => array_merge(["" => ""], $data),
    						'options' => ['placeholder' => 'Select a state ...'],
    						'pluginOptions' => [
        						'allowClear' => true
    						],
						]);
						echo ' ' . Html::submitButton(Yii::t('app','Aceptar'), ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']);
						ActiveForm::end();
					?>
				</div>
			</div>
		</div>
	</div>
</div>
