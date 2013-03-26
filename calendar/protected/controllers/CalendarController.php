<?php

class CalendarController extends CController {

	public function actionCalendar(){
		$data["myValue"] = "Content loaded";
		$this->renderPartial('calendar',$data,false,true);
	}

	public function actionIndex(){
		//$data = array();
        	$data["myValue"] = "Content loaded";
 
       	 $this->render('index', $data);
		$this->render('index');
	}

	public function actionMonth() {
		$data["myValue"] = "Content loaded";
		$this->render('month',null);
	}

	public function actionPreviousday($timestamp){
		$timestamp = $timestamp - (24*60*60);

		$this->render('today',array('timestamp'=>$timestamp));
	}

	public function actionNextday($timestamp){
		$timestamp = $timestamp + (24*60*60);

		$this->render('today',array('timestamp'=>$timestamp));
	}

	public function actionToday() {
		//Yii::trace($time,'system.db');
		$timestamp = time();
		$this->render('today',array('timestamp'=>$timestamp));
		//$this->renderPartial('today',null,false,true);
	}

	public function actionSevendays() {
		$this->renderPartial('sevendays',null,false,true);
	}

	public function actionWeek() {
		$this->render('week',null);
	}

	public function actionCreate(){
		$model = new CreateEventForm;

		if(isset($_POST['ajax'])  && $_POST['ajax'] === 'create-event-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['CreateEventForm'])){
			$model->attributes = $_POST['CreateEventForm'];

			if($model->validate() && $model->createEvent()){
				$this->redirect(array('site/index'));
			}	
		}
		$this->render('createDialog',array('model'=>$model));
	}

	public function actionCreateEventView() {

		//$model = new CreateEventForm;


		$this->renderPartial('createEventView',array('model'=>$model),false,true);	
	}
}
