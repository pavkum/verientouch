<?

class CreateEventForm extends CFormModel {

	private static $DAYOFFSET = 86400;

	private static $WEEKOFFSET = 604800;

	public $generalError;

	public $eventName;

	public $eventId;

	public $calendarId;

	public $startDate;

	public $endDate;

	public $startTime;

	public $endTime;

	public $startTimezone;

	public $endTimezone;

	public $location;

	public $attendies;

	public $repeat;

	public $weekRepeatOn;

	public $monthRepeatOn;

	public $eventPriority;

	public $eventColor;

	public $startsOn;

	public $endCriteria;
	
	public $endsOn;

	public $endsAfter;

	public $endsNever;

	public $totalOccurences;

	public $remainder;

	public $remainderDuration;

	public $guestArray;

	public $allDayEvent;

	public $description;

	public $eventType;

	public $eventCron;

	/*public function __construct(){
		$time = time();
		$startDate = date('d-M-yyyy',$time);

		$endDate = date('d-M-yyyy',$time + (24*60*60*1000));
		
	}*/

	public function rules() {
		
		return array(
			
			array('eventName,startDate,endDate,startTime,endTime,calendarId','required'),
			array('startDate,endDate','date','format'=>'yyyy-M-d'),
			array('startDate','validateDateTime'),
			array('guestArray','validateGuestArray'),
			array('remainder','validateRemainderArray'),
			array('repeat,weekRepeatOn,monthRepeatOn,endCriteria,endsOn,endsAfter,remainderDuration,remainder,eventPriority,eventColor,location','safe'),

		);

	}

	public function validateDateTime($attribute,$params){
		$eventStart = $this->startDate . " " . $this->startTime;
		$eventEnd = $this->endDate . " " . $this->endTime;
		
		$eventStart = strtotime($eventStart);
		$eventEnd = strtotime($eventEnd);

		if($eventEnd <= $eventStart){
			$this->addError('startTime','Start Time should be Less than End Time');
		}

		if($this->endCriteria == 2){
			$endOn = $this->endsOn . " " .$this->endTime;
			$endOn = strtotime($endOn);

			if($endOn <= $eventStart){
				$this->addError('endsOn','Ends On should be more than start time');
			}
		}
		
	}

	public function validateGuestArray($attribute,$params){

		if($this->guestArray != 0){
			$validator = new GuestEmailValidator($this->guestArray);

			$error = $validator->validate();

			if($error != ""){
				$this->addError('guestArray',$error);
			}
		}
	}

	public function validateRemainderArray($attribute,$params){

		if($this->remainder != 0){
		$remainders = explode(',',$this->remainder);
		$error = "";
		Yii::trace(count($remainders),'system.db');
		for($i=0;$i<count($remainders);$i++){
		
			$remainderParams = explode(':',$remainders[$i]);
				$duration = $remainderParams[0];
				$durationType = $remainderParams[1];
				$remainderType = $remainderParams[2];
				if(!is_int($duration)){
					$error = $error . $duration . " is not valid Duration\n";
				}
				// Below two condition will never happen
				if(!is_int($durationType) && $durationType < count($this->getRemainderDurationType())){
					$error = $error . " please select valid Remainder duration type \n";
				}
				if(!is_int($remainderType) && $remainderType < count($this->getRemainderTypes())){
					$error = $error . " please select valid Remainder notification type\n";
				}
		}

		
		if($error != "")
			$this->addError('remainder',$error);
		}

	}

	public function attributeLabels() {
	
		return array (
			'eventName'=>'Event Name',
			'calendarId'=>'Calendar',
			'startDate'=>'Start Date',
			'endDate' => 'End Date',
			'startTime' => 'Start Time',
			'endTime' => 'End Time',
			'location' => 'Location',
			'attendies' => 'Attendies',
			'repeat' => 'Repeat',
			'weekRepeatOn' => 'Repeat On',
			'monthRepeatOn'=> 'Repeat On',
			'eventPriority' => 'Event Priority',
			'eventColor' => 'Event Color',
			'startsOn' => 'Starts On',
			'endsOn' => 'Ends On',
			'endsAfter' => 'Ends After',
			'endsNever' => 'Ends Never',
			'totalOccurences' => 'Total Occurances',
			'endCriteria' => 'End',
			'remainder' => 'Remainder',
		);

	}

	public function getTime() {
		return array(

			'0:00'=>'12:00AM',
			'0:30'=>'12:30AM',
			'1:00'=>'1:00AM',
			'1:30'=>'1:30AM',
			'2:00'=>'2:00AM',
			'2:30'=>'2:30AM',
			'3:00'=>'3:00AM',
			'3:30'=>'3:30AM',
			'4:00'=>'4:00AM',
			'4:30'=>'4:30AM',
			'5:00'=>'5:00AM',
			'5:30'=>'5:30AM',
			'6:00'=>'6:00AM',
			'6:30'=>'6:30AM',
			'7:00'=>'7:00AM',
			'7:30'=>'7:30AM',
			'8:00'=>'8:00AM',
			'8:30'=>'8:30AM',
			'9:00'=>'9:00AM',
			'9:30'=>'9:30AM',
			'10:00'=>'10:00AM',
			'10:30'=>'10:30AM',
			'11:00'=>'11:00AM',
			'11:30'=>'11:30AM',
			'12:00'=>'12:00PM',
			'12:30'=>'12:30PM',
			'13:00'=>'1:00PM',
			'13:30'=>'1:30PM',
			'14:00'=>'2:00PM',
			'14:30'=>'2:30PM',
			'15:00'=>'3:00PM',
			'15:30'=>'3:30PM',
			'16:00'=>'4:00PM',
			'16:30'=>'4:30PM',
			'17:00'=>'5:00PM',
			'17:30'=>'5:30PM',
			'18:00'=>'6:00PM',
			'18:30'=>'6:30PM',
			'19:00'=>'7:00PM',
			'19:30'=>'7:30PM',
			'20:00'=>'8:00PM',
			'20:30'=>'8:30PM',
			'21:00'=>'9:00PM',
			'21:30'=>'9:30PM',
			'22:00'=>'10:00PM',
			'22:30'=>'10:30PM',
			'23:00'=>'11:00PM',
			'23:30'=>'11:30PM',

		);
	}

	public function getRepeat() {
		return array(
			'0' => 'Never',
			'1' => 'Dialy',
			'2' => 'Weekly',
			'3' => 'Week Days (Mon - Fri)',
			'4' => 'Weekend (Sat & Sun)',
			'5' => 'Monthly',
			'6' => 'Yearly',
		);
	}

	public function getWeekRepeatOn() {
		return array(
			'0' => 'S',
			'1' => 'M',
			'2' => 'T',
			'3' => 'W',
			'4' => 'T',
			'5' => 'F',
			'6' => 'S',
		);
	}

	public function getMonthRepeatOn(){
		return array(
			'0' => 'J',
			'1' => 'F',
			'2' => 'M',
			'3' => 'A',
			'4' => 'M',
			'5' => 'J',
			'6' => 'J',
			'7' => 'A',
			'8' => 'S',
			'9' => 'O',
			'10' => 'N',
			'11' => 'D',
		);
	}

	public function getEventPriority() {
		return array(
			'0' => 'Normal',
			'1' => 'Medium',
			'2' => 'High',
		);
	}

	public function getRemainderTypes() {
		return array(
			'0' => 'Email',
			'1' => 'Pop Up',
		);
	}

	public function getRemainderDurationType() {
		return array(
			'0' => 'Minutes',
			'1' => 'Hours',
			'2' => 'Days',
			'3' => 'Weeks',
		);
	}
	
	public function getColors(){
		return array(
			'red'=>'FF0000',
			'AntiqueWhite'=>'FAEBD7',
			'cyan'=>'00FFFF',
			'GreenYellow'=>'ADFF2F',
			'LightSkyBlue'=>'87CEFA',
			'LemonChiffon'=>'FFFACD',
		);
	}

	public function getEndOptions() {
		return array(
			'0' => 'One Time Event',
			'1' => 'Never',
			'2' => 'Ends On',
			'3' => 'Ends After',
		);
	}

	public function getUserCalendars(){
		$user = Yii::app()->session['USER'];
		return $user->getCalendars();
	}

	public function createEvent(){
		$this->prepareEventCron();
		
		return CreateEvent::createUserEvent($this);
	}

	public function prepareEventCron(){
		
		$minute 	= '*';
		$hour   	= '*';
		$dayofmonth     = '*';
		$month 		= '*';
		$dayofweek	= '*';


		$minute = explode(':',$this->startTime);
		$hour = $minute[1];
		$minute = $minute[0]; 

		switch($this->repeat){
				case 0:	$this->calculateEndDate(null);		
					break;

				case 1:$dayofweek = '0,1,2,3,4,5,6';
					$this->calculateEndDate($dayofweek);
					break;

				case 2:$dayofweek = $this->weekRepeatOn;
					$dayofweek = implode(',',$dayofweek);
					$this->calculateEndDate($dayofweek);
					break;

				case 3:$dayofweek = '0,1,2,3,4';
					$this->calculateEndDate($dayofweek);
					break;

				case 4:$dayofweek = '5,6';
					$this->calculateEndDate($dayofweek);
					break;

				case 5:$month=$this->monthRepeatOn;
					$month = implode(',',$month);
					$this->calculateEndDate($month);
					break;

				case 6:$month = date('m',$this->startDate);
					$this->calculateEndDate($month);
					break;
			
		}

		if($this->eventColor == 0){
			$this->eventColor = Yii::app()->session['USER']->getCalendar($this->calendarId)->getCalendarColor();
		}
		$this->eventCron = $minute . " " . $hour . " " . $dayofmonth . " " . $month . " " .$dayofweek;
	}

	private function calculateEndDate($repeatable){
		switch($this->endCriteria){
			case 0:	$this->endsAfter = 0;
				$this->endsOn = 0;
				break;

			case 1: $this->endDate = '19-1-2038';
				$this->endsAfter = 0;
				break;

			case 2: $this->endDate = $this->endsOn;
				$this->endsAfter = 0;
				break;

			case 3: $this->endDate = $this->getEndDateForEndAfterEvents($this->endsAfter,$this->startDate,$repeatable);
				$this->endsOn = 0;
				break;

		}
	}

	private function getEndDateForEndAfterEvents($maxEventOccurances,$startDate,$dayOfWeek){
		$perUnitCount = count($dayOfWeek);		
		$pendingEvents = $maxEventOccurances / $perUnitCount;
		
		$startDate = strtotime($startDate);

		$absoluteWeeks = floor($pendingEvents);
		
		$pendingEvents = $pendingEvents - $absoluteWeeks;

		$pendingEvents = $pendingEvents * $perUnitCount;

		if($pendingEvents == 0){
			$absoluteWeeks--;
			$pendingEvents = $perUnitCount;
		}

		$endDate = self::$WEEKOFFSET * $absoluteWeeks;
		$endDate = $startDate + $endDate;
		
		$dayOfWeek = $this->getWeekRepeatInfo($dayOfWeek);
		$pendingEvents = round($pendingEvents);		

		$offset = $dayOfWeek[$pendingEvents];
		$endDate = $endDate + $offset;
		return date('Y-m-d',$endDate);

	}

	private function getWeekRepeatInfo($daysOfWeek){
		$days = explode(',',$daysOfWeek);
		$noOfRepeatsInAWeek = count($days);

		$weekOffset = array();

		for($i=0; $i < $noOfRepeatsInAWeek; $i++){
			$weekOffset[$i+1] = ($days[$i] - $days[0]) * self::$DAYOFFSET;
		}
		
		return $weekOffset;
	}
}
