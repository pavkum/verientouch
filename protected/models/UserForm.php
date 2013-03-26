<?php

class UserForm extends CFormModel

	public $name;
	public $email;
	public $dob;

	public function rules(){

		return array(

			array('name , email , dob','required'),

			);

	}

	
