<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Country;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
	<h1><?= Html::encode($this->title)?></h1>

	<p>Please fill out the following fields to signup:</p>
	
	<h1>GGWP MANNNNNNNNNNNNNNNNNNNNNN</h1>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(); ?>
				<?= $form->field($model,'name') ?>
				<?= $form->field($model,'first_name') ?>
				<?= $form->field($model,'last_name') ?>
				<?= $form->field($model,'ic') ?>
				<?= $form->field($model,'dob') ?>
				<h4>*Date Format : YYYY-MM-DD</h4>
				<?= $form->field($model,'gender')->dropDownList(
					['0' => 'Male', '1' => 'Female']
					) ?>
				<?= $form->field($model,'email') ?>
				<?= $form->field($model,'address') ?>
				<?= $form->field($model,'postcode') ?>
				<?= $form->field($model,'city') ?>
				<?= $form->field($model,'state') ?>
				<?= $form->field($model, 'country')->dropDownList(
						ArrayHelper::map(Country::find()->all(),'id','name'),
						['prompt'=>'Select Country']
					)?>
				<?= $form->field($model,'country_code') ?>
				<?= $form->field($model,'contact_number') ?>
			<div class="form-group">
				<?= Html::submitButton('Sign Up',['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

