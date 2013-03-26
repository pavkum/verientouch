<?php

class VerientouchUser extends CWebUser{
  	
	 public function init(){

	        $conf = Yii::app()->session->cookeParams;
	        $this->identityCookie = array(
	            'path' => $conf['path'],
	            'domain' => $conf['domain'],
		);
		$this->allowAutoLogin = true;
	   parent::init();
	}

}
