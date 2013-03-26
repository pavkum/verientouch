<?php
	
class CreateEvent {

	private static $CREATE_EVENT_QUERY = 'INSERT INTO event_data 
			(EVENT_NAME,TIME,DATE,START_TIMEZONE,END_TIMEZONE,ALL_DAY_EVENT,EVENT_DESCRIPTION,EVENT_TYPE,REPEAT_TYPE,
			END_ON,END_NEVER,END_AFTER,EVENT_COLOR,EVENT_CRON,CALENDAR_ID,EVENT_PRIORITY)
			VALUES (:EVENT_NAME, :TIME, :DATE, :START_TIMEZONE, :END_TIMEZONE, :ALL_DAY_EVENT, :EVENT_DESCRIPTION,
			:EVENT_TYPE, :REPEAT_TYPE, :END_ON, :END_NEVER, :END_AFTER, :EVENT_COLOR, :EVENT_CRON, :CALENDAR_ID, :EVENT_PRIORITY)' ;	


	public static function createUserEvent($model){
		$connection = Yii::app()->db_calendar;
	
		$transaction = $connection->beginTransaction();
		try{
			
			$insertCommand = $connection->createCommand(self::$CREATE_EVENT_QUERY);
			
			$time = $model->startTime.'|'.$model->endTime;
			$date = $model->startDate.'|'.$model->endDate;			

			$insertCommand->bindParam(":EVENT_NAME",$model->eventName,PDO::PARAM_STR);
			$insertCommand->bindParam(":TIME",$time,PDO::PARAM_STR);
			$insertCommand->bindParam(":DATE",$date,PDO::PARAM_STR);
			$insertCommand->bindParam(":START_TIMEZONE",$model->startTimezone,PDO::PARAM_INT);
			$insertCommand->bindParam(":END_TIMEZONE",$model->endTimezone,PDO::PARAM_INT);
			$insertCommand->bindParam(":ALL_DAY_EVENT",$model->allDayEvent,PDO::PARAM_BOOL);
			$insertCommand->bindParam(":EVENT_DESCRIPTION",$model->description,PDO::PARAM_STR);
			$insertCommand->bindParam(":EVENT_TYPE",$model->eventType,PDO::PARAM_INT);
			$insertCommand->bindParam(":REPEAT_TYPE",$model->repeat,PDO::PARAM_INT);
			$insertCommand->bindParam(":END_ON",$model->endsOn,PDO::PARAM_STR);
			$insertCommand->bindParam(":END_NEVER",$model->endsNever,PDO::PARAM_BOOL);
			$insertCommand->bindParam(":END_AFTER",$model->endsAfter,PDO::PARAM_STR);
			$insertCommand->bindParam(":EVENT_COLOR",$model->eventColor,PDO::PARAM_INT);
			$insertCommand->bindParam(":EVENT_CRON",$model->eventCron,PDO::PARAM_STR);
			$insertCommand->bindParam(":CALENDAR_ID",$model->calendarId,PDO::PARAM_INT);
			$insertCommand->bindParam(":EVENT_PRIORITY",$model->eventPriority,PDO::PARAM_INT);

			$insertCommand->execute();

			$transaction->commit();

			$event = new Event;

				$event->setEventId(Yii::app()->db->getLastInsertId());
				$event->setEventName($model->eventName);
				$event->setStartTime($model->startTime);
				$event->setEndTime($model->endTime);
				$event->setEventType($model->eventType);
				$event->setEventCron($model->eventCron);
				$event->setEndOn($model->endsOn);
				$event->setEndNever($model->endsNever);
				$event->setEndAfter($model->endsAfter);
				$event->setEventPriority($model->eventPriority);
				$event->setEventColor($model->eventColor);

				Yii::app()->session['USER']->addEvent(explode(' ',$model->startTime)[0],$event);

			return true;
		
		}catch(Exception $e){
			Yii::log("EVENT_CREATION_ERROR : ".Yii::app()->user->name.$e,"system.db");
			$transaction->rollback();
			return false;
		}

	}

	public function createCalendar($model){

	}

}
