<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

$this->title = 'Data';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-search">
	<?php if(yii::$app->session->hasFlash('message')):?>
		<div class="alert alert-dimissible alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo yii::$app->session->getFlash('message');?>
		</div>
	<?php endif;?>

	<?php $form = ActiveForm::begin([
			'method' => 'get'
		]); ?>
		<div class="row">

			<div class="form-group col-lg-2">
				<?= $form->field($searchModel,'id')->textInput(['placeholder' => 'Enter ID']) ?>
			</div>

			<div class="form-group col-lg-2">
				<?= $form->field($searchModel,'name')->textInput(['placeholder' => 'Enter Name']) ?>
			</div>

			<div class="form-group col-lg-2">
				<?= $form->field($searchModel,'first_name')->textInput(['placeholder' => 'Enter First Name']) ?>
			</div>

			<div class="form-group col-lg-2">
				<?= $form->field($searchModel,'last_name')->textInput(['placeholder' => 'Enter Last Name']) ?>
			</div>

			<div class="form-group col-lg-2">
				<?= $form->field($searchModel,'dob')->textInput(['placeholder' => 'Enter Dirth of Birth']) ?>
			</div>

			<div class="form-group col-lg-3">
				<?= Html::submitButton('Search',['class' => 'btn btn-primary']) ?>
			</div>

	<?php ActiveForm::end(); ?>

		</div>
</div>

<?php
	echo GridView::widget([
		'dataProvider' => $dataProvider,
		'columns'=>[
			['class'=>'yii\grid\SerialColumn'],
			'id',
			'name',
			'first_name',
			'last_name',
			'dob',
			[
				'class' => 'yii\grid\ActionColumn',
				'header' => 'Action',
					'headerOptions' => ['width' => '80'],
			'template' => '{view} {update} {delete}',
			]

		]
	])
?>