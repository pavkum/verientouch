<?php

class SignUpComponent {


	public function checkForExistingEmail($email){
		$count = Yii::app()->db->createCommand()
				->select('count(*)')
				->from('user_profile')
				->where('EMAIL_ID=\''.$email.'\'')
				->queryRow();
		Yii::trace("Email ID count : ".implode($count,","),"system.db");
		if(implode($count,",") == 0){
			return true;
		}else{
			return false;
		}

	}

	public function checkForExistingUsername($username){
		$count = Yii::app()->db->createCommand()
				->select('count(*)')
				->from('user_profile')
				->where('USER_NAME=\''.$username.'\'')
				->queryRow();
		Yii::trace("Username count : ".implode($count,","),"system.db");
		if(implode($count,",") == 0){
			return true;
		}else{
			return false;
		}

	}

	private function encryptPassword($password){
		return crypt($password);
	}

	public function signup($model){
		try{

			$authentication_token = md5($model->password);
			$linked_key = md5($model->email_id);

			$this->insertIntoVerificationTable($model->username,$authentication_token,$linked_key);
			$this->sendConfirmationMail($authentication_token,$model->email_id,$linked_key);

			$command = Yii::app()->db->createCommand();
		
			$command->insert('user_profile', array(
				'USER_NAME'=>$model->username,
				'PASSWORD'=>$this->encryptPassword($model->password),
				'EMAIL_ID'=>$model->email_id,
				'FIRST_NAME'=>$model->first_name,
				'LAST_NAME'=>$model->last_name,
				'GENDER'=>$model->gender,
				'DATE_OF_BIRTH'=>$model->dob,
				'LOCATION'=>$model->location,
				'VERIFIED'=>0,
				'BLOCKED'=>0,
			));
		//$command = $connection->createcommand($command);

		//$command->execute();
			return true;
		}catch(Exception $e){
			Yii::log($e,"system.db");
			return false;
		}
		
	}

	private function insertIntoVerificationTable($username,$authentication_token,$linked_key) {
		$command = Yii::app()->db->createCommand();
		
		$command->insert('pending_verification_table', array(
			'USER_NAME'=>$username,
		        'ACTIVATION_KEY'=>$authentication_token,
			'LINKED_KEY'=>$linked_key,
			'CREATION_DATE'=>date("Y-m-d"),
		));
	}

	private function sendConfirmationMail($authentication_token,$email,$linked_key){
		$subject = "Email Confirmation for your account registration";
		$body = "please click on the below link \r\n http://validations.verientouch.com?aut=". $authentication_token."&lin=".$linked_key;

		Yii::app()->mailer->AddAddress($email);
		Yii::app()->mailer->Subject = $subject;
		Yii::app()->mailer->MsgHTML($body);
		Yii::app()->mailer->Send();
	}




}
