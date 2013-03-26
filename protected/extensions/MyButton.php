<?php

// This button is created to use within verientouch domain written by Pavan

class MyButton extends CWidget{

	public $label;
	public $path;
	public $marginleft = 0;
	public $borderleft = 1;

	public function run() {
 
	        echo CHtml::button($this->label, array(
   		        'class' => 'button',
			'style' => 'margin-left:'.$this->marginleft.'; border-left:'.$this->borderleft.'px solid white;',
		        'submit' => array($this->path),
                	)
        	);
    	}


	protected function registerClientScript(){
        // ...publish CSS or JavaScript file here...
        	$cs=Yii::app()->clientScript;
        	$cs->registerCssFile(Yii::app()->request->baseUrl."/css/button.css");
        	//$cs->registerScriptFile($jsFile);
       	}
}


