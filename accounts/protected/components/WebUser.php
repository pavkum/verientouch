<?php
class MyWebUser extends CWebUser{

	 public $identityCookie = array(
        	'path' => '/',
        	'domain' => '.verientouch.com',
	);

	public function init(){
	        $conf = Yii::app()->session->cookieParams;
        	$this->identityCookie = array(
        	'path' => $conf['path'],
	        'domain' => $conf['domain'],
        );
        parent::init();
    }
}


