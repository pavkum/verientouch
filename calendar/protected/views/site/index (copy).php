<?php
	$data = "pavan";
	$va = "a";
?>

<div class="containerbody">

	<div class="calendarHeaderPanel">
		<table>
			<td>
				<!--<?php echo CHtml::button('create',array('class'=>'createbutton','onclick'=>'calendar/create'));

				?>-->
				<?php echo CHtml::ajaxButton ("Create",
						 CController::createUrl('calendar/Create'), 
						 array('update' => '.containerbody'),
						  array('class'=>'createbutton'));?>
				
			</td>


			<td>
				<div class="buttonList">
					<table cellpadding="0" cellspacing="0">
						<!--<td><?php echo CHtml::ajaxButton ("Today",
				     			 CController::createUrl('calendar/Today'), 
				    			 array('update' => '.ajax'),
							  array('class'=>'calendarTypeButtons'));?>
						</td>-->
						<td><?php echo CHtml::button ("Today", array('submit' => array('calendar/today'),
									'class'=>'calendarTypeButtons'
									));?>
						</td>
						<td style="border-left:1px solid #EBEBEB"><?php echo CHtml::ajaxButton ("Week",
				     			 CController::createUrl('calendar/Week'), 
				    			 array('update' => '.ajax'),
							  array('class'=>'calendarTypeButtons')); ?>
						</td>
						<td style="border-left:1px solid #EBEBEB"><?php echo CHtml::ajaxButton ("Month",
				     			 CController::createUrl('calendar/Month'), 
				    			 array('update' => '.ajax'),
							  array('class'=>'calendarTypeButtons')); ?>
						</td>
						<td style="border-left:1px solid #EBEBEB"><?php echo CHtml::button('Agenda', 
							array('submit' => array('/site/login'),
							'class' => 'calendarTypeButtons',
							)); ?>
						</td>
						</table>
				</div>
			</td>
	
		</table>
	</div>

	<div class="ajax">

	</div>
	
</div>
