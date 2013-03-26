<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->actionSignup();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionSignup(){

		$model = new SignUpForm;

		if(isset($_POST['ajax'])  && $_POST['ajax'] === 'signup-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['SignUpForm'])){
			$model->attributes = $_POST['SignUpForm'];

			if($model->validate()  && $model->validateForUsernameAndExistingEmail()){

				if($model->signup()){
					$this->actionSignupsuccess();
				}
			}
	
		}
		$this->render('signup',array('model'=>$model));
	}

	public function actionSignupsuccess(){

		$this->render('signupsuccess');


	}	
	
}
