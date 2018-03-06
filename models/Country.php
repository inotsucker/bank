<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
   public function rules()
   {
   	return [
   		[['id','name','short_name','country_code','created_at', 'is_deleted'],'safe']
   	];
   } 

   public function attributeLabels()
   {
   	return [
   		'id' => 'ID',
   		'name' => 'Name',
   		'short_name' => 'Short Name',
   		'country_code' => 'Country Code',
   		'created_at' => 'Created At',
   		'is_deleted' => 'Deleted',

   	];
   }

}
