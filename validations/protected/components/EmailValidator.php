<?php

class EmailValidator {

	public static function validate($aut,$lin) {

		$command = Yii::app()->db->createCommand()
				->select('USER_NAME')
				->from('pending_verification_table')
				->where('ACTIVATION_KEY=:ACTIVATION_KEY and LINKED_KEY=:LINKED_KEY',array(':ACTIVATION_KEY'=>$aut,':LINKED_KEY'=>$lin));

		//$command->bindParam(':ACTIVATION_KEY',$key,PDO::PARAM_STR);
		$user = $command->queryRow();

		if($user != null){
			$user = implode($user,",");

			if(EmailValidator::updateUserProfile($user)){
				return EmailValidator::clearUserFromValidationTable($aut);
			}else{
				return false;
			}

		}else{

			return false;
		}

	}

	private static function updateUserProfile($user){
		$command = Yii::app()->db->createCommand();

		$count = $command->update(
				'user_profile',array(
					'VERIFIED'=>1,
				),'USER_NAME=:USER_NAME',array('USER_NAME'=>$user)			
			);
		
		//$command->bindParam(':USER_NAME',$key,PDO::PARAM_STR);		

		if($count != null){
			Yii::trace($count,"system.db");

			if($count == 1){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
						

	}

	private static function clearUserFromValidationTable($key){
		$command = Yii::app()->db->createCommand();
		
		$count = $command->delete('pending_verification_table',
					'ACTIVATION_KEY=:ACTIVATION_KEY',array(':ACTIVATION_KEY'=>$key)
				);

		if($count != null){
			
			if($count == 1){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

}
