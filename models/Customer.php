<?php

namespace app\models;

use yii\db\ActiveRecord;

class Customer extends ActiveRecord
{
   public function rules()
   {
   	return [
   		[['id','name','first_name','last_name','ic','dob','gender','email','address','postcode','city','state','country','country_code','contact_number','remark','created_at', 'is_suspended', 'is_deleted'],'safe']
   	];
   } 

   public function attributeLabels()
   {
   	return [
   		'id' => 'ID',
   		'name' => 'Name',
   		'first_name' => 'First Name',
   		'last_name' => 'Last Name',
   		'ic' => 'IC',
   		'dob' => 'Date of Birth',
   		'gender' => 'Gender',
   		'email' => 'E-Mail',
   		'address' => 'Address',
   		'postcode' => 'Postcode',
   		'city' => 'City',
   		'state' => 'State',
   		'country' => 'Country',
   		'country_code' => 'Country Code',
   		'contact_number' => 'Contact Number',
   		'remark' => 'Remark',
   		'created_at' => 'Created At',
   		'is_suspended' => 'Suspended',
   		'is_deleted' => 'Status',
   	];
   }

}
