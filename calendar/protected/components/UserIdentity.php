<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	

    public function authenticate()
    {
        $record=$this->checkForAuthenticUser();
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(crypt($this->password,$record) !== $record){
		Yii::trace(crypt($this->password,$record),'system.db');
		Yii::trace($record,'system.db');
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
	}
        else
        {
		//Yii::trace("success","system.db");
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
   	public function checkForAuthenticUser(){

		$ROW = Yii::app()->db->createCommand()
				->select('PASSWORD,CALENDAR,LOCATION')
				->from('user_profile')
				->where('USER_NAME=\''.$this->username.'\'')
				->queryRow();


		if($ROW == null)
			return null;
		else{
			Yii::app()->session['LOCATION'] = $ROW['LOCATION'];
			Yii::app()->session['CALENDAR'] = $ROW['CALENDAR'];
			return $ROW['PASSWORD'];
			//return implode(",",$ROW);
		}
		/*
		if( $PASSWORD != null ){
			if(implode($PASSWORD,",") == $this->password){
				return true;
			}else{
				return false;
			}

		}
			
		else
			return false;
		*/
		
	}
}
