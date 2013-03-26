<?php

/*
 *
 * Author Pavan
 *
 *
*/

class SignUpForm extends CFormModel{

	public $first_name;
	public $last_name;
	public $dob;
	public $gender;

	public $username;
	public $password;
	public $password_repeat;
	
	public $email_id;
	public $phone;	

	public $location;

	public $newsletter;
	public $verifyCode;


	public function __construct(){
		$this->gender = 0;
	}

	public function rules(){

		return array(
				array('username','required','message'=>'Username is mandatory'),
				array('username','length','max'=>24),

				array('password','required'),
				array('password','length','max'=>24),

				array('password_repeat','required'),
				array('password_repeat','length','max'=>24),

				array('password', 'compare', 'compareAttribute'=>'password_repeat'),
				
				array('first_name','required'),
				array('first_name','length','max'=>24),

				array('last_name','length','max'=>24),

				array('email_id','required'),
				array('location','required'),

				array('dob','required'),
				array('gender','required'),

				array('dob','date', 'format'=>'yyyy-M-d'),

				array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
				
			);
	}
	

	public function attributeLabels(){

		return array(
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'dob' => 'Date of Birth',
			'gender' => 'Gender',
			'username' => 'Username',
			'password' => 'Password',
			'password_repeat' => 'Confirm Password',
			'email_id' => 'Email ID',
			'phone' => 'Phone',
			'location' => 'Location',
			'newsletter' => 'Allow us to keep in touch with you by sending promotional mails or important announcements',
			'verifyCode' => 'Prove that you are a Human',
			
		);
	}

	public function getGenderOptions(){
		return array(
			0=>'Male',
			1=>'Female',
		);
	}

	public function getCountryList(){
		return  CountryList::getCountryList();
	}

	public function validateForUsernameAndExistingEmail(){
		$signup = new SignUpComponent;

		if(!$signup->checkForExistingUsername($this->username)){
			$this->addError('username','Username is already taken');
			return false;
		}

		if(!$signup->checkForExistingEmail($this->email_id)){
			$this->addError('email_id','An account with this Email ID already exists');
			return false;
		}

		return true;
	}

	public function signup(){
		$signup = new SignUpComponent;

		return $signup->signup($this);
	}

}
	

