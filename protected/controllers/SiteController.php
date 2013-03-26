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

	public function actionAbout(){

		$this->render('about');
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	public function actionCalendar(){
		$this->redirect('http://www.calendar.verientouch.com');
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

	public function actionLogin(){
		$cookie = new CHttpCookie('loginredirect', "http://www.vereintouch.com");
		Yii::app()->request->cookies['loginredirect'] = $cookie;
		$this->redirect('http://www.accounts.verientouch.com?account/login');
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: queries@verientouch.com";

				//mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				mail(Yii::app()->params['adminEmail'],$subject,$message,$headers);
				
				//$this->sendMailToQueries($subject,$model->body);
				$this->sendMailToQueryRaiser($model->email,$subject,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	public function sendMailToQueries($subject,$body){
		Yii::app()->mailer->AddAddress("queries@verientouch.com");
		Yii::app()->mailer->Subject = $subject;
		Yii::app()->mailer->MsgHTML($body);
		Yii::app()->mailer->Send();
	}	
	
	public function sendMailToQueryRaiser($email,$subject,$header){
		$subject = "Confirmation mail for receiving your query : ".$subject;
		$mailbody = "<p>This is a confirmation mail that we have receivied your query <?php echo $subject ?>. We'll respond to your query at the earliest. Thank you for contacting us. </p> <p>Regards,</p> <p>verientouch Team</p>";
		mail($email,$subject,$mailbody,$header);

	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
