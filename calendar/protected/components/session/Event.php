<?php

class Event{
	
	private $eventId;

	private $eventName;

	private $eventType;

	private $eventCron;

	private $startDate;

	private $endDate;

	private $startTime;

	private $endTime;

	private $eventColor;

	private $endOn;

	private $endNever;

	private $endAfter;

	private $eventPriority;

	private $remainders;

	private $calendarId;

	public function __construct(){
		$remainders = array();
	}

	public function setEventId($eventId){
		$this->eventId = $eventId;
	}

	public function getEventId(){
		return $this->eventId;
	}

	public function setEventName($eventName){
		$this->eventName = $eventName;
	}

	public function getEventName(){
		return $this->eventName;
	}

	public function setEventType($eventType){
		$this->eventType = $eventType;
	}

	public function getEventType(){
		return $this->eventType;
	}

	public function setEventCron($eventCron){
		$this->eventCron = $eventCron;
	}

	public function validate($date){
		
		$cronParams = explode(' ',$this->eventCron);

		if($cronParams[4] !== '*'){
			$week = date('w',$date);
			if(in_array($week,$cronParams[4])){
				return true;
			}
		}else{
			
		}

		$date = date('d-m-Y',$date);
		return $this->eventCron;
	}

	public function setStartTime($startTime){
		$this->startTime = $startTime;
	}

	public function getStartTime(){
		return $this->startTime;
	}

	public function setEndTime($endTime){
		$this->endTime = $endTime;
	}

	public function getEndTime(){
		return $this->endTime;
	}

	public function setEventColor($eventColor){
		$this->eventColor = $eventColor;
	}

	public function getEventColor(){
		return $this->eventColor;
	}
	
	public function setEndOn($endOn){
		$this->endOn = $endOn;
	}

	public function getEndOn(){
		return $this->endOn;
	}

	public function setEndAfter($endAfter){
		$this->endAfter = $endAfter;
	}

	public function getEndAfter(){
		return $this->endAfter;
	}

	public function setEndNever($endNever){
		$this->endNever = $endNever;
	}

	public function getEndNever(){
		return $this->endNever;
	}

	public function setEventPriority($eventPriority){
		$this->eventPriority = $eventPriority;
	}

	public function getEventPriority(){
		return $this->eventPriority;
	}

	public function setCalendarId($calendarId){
		$this->calendarId = $calendarId;
	}

	public function getCalendarId(){
		return $this->calendarId;
	}

	public function setStartDate($startDate){
		$this->startDate = $startDate;
	}

	public function getStartDate(){
		return $this->startDate;
	}

	public function setEndDate($endDate){
		$this->endDate = $endDate;
	}

	public function getEndDate(){
		return $this->endDate;
	}
}
