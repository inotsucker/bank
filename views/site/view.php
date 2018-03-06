<?php
use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = 'View';
?>

<div class="customer-view">

	<h1><?=Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update','id'=>$model->id],['class'=>'btn btn-primary'])?>
		<?=Html::a('Delete',['delete','id'=>$model->id],[
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' =>'post',
			],
		])?>
	</p>

<?= DetailView::widget([
	'model' => $model,
	'attributes' =>[
		'id',
		'name',
		'first_name',
		'last_name',
		'ic',
		'dob',
		'gender' =>
		[
			'attribute' => 'gender',
			'value' => function($model){
				if($model->gender == '0')
				{
					return "Male";
				}
				else
				{
					return "Female";
				}
			}
		],
		'email',
		'address',
		'postcode',
		'city',
		'state',
		'country' =>
		[
			'attribute' => 'country',
			'value' => function($model){
				if($model->country == '1')
				{
					return "Malaysia";
				}
				else
				{
					return "Singapore";
				}
			}
		],
		'country_code',
		'contact_number',
		'remark',
		'created_at',
		'updated_at',
		'is_suspended' =>
		[
			'attribute' => 'is_suspended',
			'value' => function($model){
				if($model->is_suspended == '0')
				{
					return "Not Suspended";
				}
				else
				{
					return "Suspended";
				}
			}
		],
		'is_deleted' =>
		[
			'attribute' => 'is_deleted',
			'value' => function($model){
				if($model->is_deleted == '0')
				{
					return "Active";
				}
				else
				{
					return "Inactive";
				}
			}
		],
	],
])?>
