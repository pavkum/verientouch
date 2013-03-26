<?php
	echo "index";
	$myValue = "";
?>

<div id="data">
   <?php $this->renderPartial('calendar', array('myValue'=>$myValue)); ?>
</div>

<?php echo CHtml::ajaxButton ("Update data",
                              CController::createUrl('calendar/calendar'), 
                              array('update' => '#data'));
?>
