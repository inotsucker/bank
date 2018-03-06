<?php
namespace app\forms;

use YII;
use app\models\Customer;
use yii\base\Model;

class SignupForm extends Model
{
	public $id;
	public $name;
	public $first_name;
	public $last_name;
	public $ic;
	public $dob;
	public $gender;
	public $email;
	public $address;
	public $postcode;
	public $city;
	public $state;
	public $country;
	public $country_code;
	public $contact_number;
	public $remark;
	public $created_at;
	public $updated_at;
	public $is_suspended;
	public $is_deleted;
	

	public function rules()
	{
		return [

			['name', 'required'],
			['first_name', 'required'],
			['last_name', 'required'],

			['ic', 'required'],
			['ic', 'integer'],

			['dob', 'required'],
			['dob', 'date', 'format' => 'yyyy-M-d'],

			['gender', 'required'],
			['email', 'required'],
			['address', 'required'],
			['postcode', 'required'],
			['city', 'required'],
			['state', 'required'],
			['country', 'required'],
			['country_code', 'required'],

			['contact_number', 'required'],
			['contact_number', 'integer'],

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

	public function signup()
	{
		if ($this->validate())
		{
			$customer = new Customer();
			$customer->name = $this->name;
			$customer->first_name = $this ->first_name;
			$customer->last_name = $this ->last_name;
			$customer->ic = $this ->ic;
			$customer->dob = $this ->dob;
			$customer->gender = $this ->gender;
			$customer->email = $this ->email;
			$customer->address = $this ->address;
			$customer->postcode = $this ->postcode;
			$customer->city = $this ->city;
			$customer->state = $this ->state;
			$customer->country = $this ->country;
			$customer->country_code = $this ->country_code;
			$customer->contact_number = $this ->contact_number;
			$customer->remark = $this ->remark;
			$customer->created_at = $this ->created_at;
			$customer->updated_at = $this ->updated_at;
			$customer->is_suspended = 0;
			$customer->is_deleted = 0;
			if(!$customer ->save())
			{

			}
			return $customer;
		}

		return null;
	}
}
?>
