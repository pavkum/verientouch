<table >
				<tr>
					<td> <?php echo $form->error($model,'generalError'); ?> </td>
				</tr>

				<tr>
					<td> <?php echo $form->labelEx($model,'eventName',array('class'=>'vLabel')); ?> <td>

					<td> <?php echo $form->textField($model,'eventName',array(
						'class'=>'vtextfield',
						)); ?>			

					</td>
					<td> <?php echo $form->error($model,'eventName'); ?> </td>
				</tr>


				<tr>
					<td> <?php echo $form->labelEx($model,'calendarId',array('class'=>'vLabel')); ?> <td>

					<td> <?php echo $form->dropDownList($model,'calendarId',$model->getUserCalendars(),
					array(
						'encode'=>1,
						'disabled'=>0,
						'default'=>0,
						'promt'=>1,
						'class'=>'dropDownList',
						'style'=>'width:100%',						
					)
					); ?>
					</td>
					<td> <?php echo $form->error($model,'calendarId'); ?> </td>
				</tr>


				<tr>
					<td> <?php echo $form->labelEx($model,'startDate'); ?> <td>
					<td>

					<table cellspacing:0; cellpadding:0 style="border-spacing:0">
					<tr><td>
					<?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    					'name'=>'startDate',
					'attribute'=>'startDate',
					'model'=>$model,
					'value'=>$model->startDate,
					    'options'=>array(
						    'showAnim'=>'fold',
						     'showButtonPanel'=>false,
   					 	     'autoSize'=>true,
					             'dateFormat'=>'yy-m-d',
					             'defaultDate'=>$model->startDate,	
					    ),
					 'htmlOptions'=>array(
					 'id' => 'startDate',
					 'class'=>'vtextfield',
					 'style'=>'width:125px'
					 ),
					));?>
					</td><td>
					<?php echo $form->dropDownList($model,'startTime',$model->getTime(),
					array(
						'empty'=>'Start Time',
						'encode'=>1,
						'disabled'=>0,
						'promt'=>1,
						'class'=>'dropDownList',
						'id' => 'startTime',
					)
					); ?>
					</td></tr>
					</table>
					</td>
					<td> <?php echo $form->error($model,'startTime'); ?> </td>
				</tr>

<tr>
					<td> <?php echo $form->labelEx($model,'endDate'); ?> <td>
					<td>

					<table cellspacing:0; cellpadding:0 style="border-spacing:0">
					<tr><td>
					<?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    					'name'=>'endDate',
					'attribute'=>'endDate',
					'model'=>$model,
					'value'=>$model->endDate,
					    // additional javascript options for the date picker plugin
					    'options'=>array(
						    'showAnim'=>'fold',
						     'showButtonPanel'=>false,
   					 	     'autoSize'=>true,
					             'dateFormat'=>'yy-m-d',
					             'defaultDate'=>$model->endDate,	
					    ),
					    'htmlOptions'=>array(
						'class'=>'vtextfield',
					    'style'=>'width:125px'
					    ),
					));?>
					</td><td>
					<?php echo $form->dropDownList($model,'endTime',$model->getTime(),
					array(
						'empty'=>'End Time',
						'encode'=>1,
						'disabled'=>0,
						'promt'=>1,
						'class'=>'dropDownList',
						'id' => 'endTime',
					)
					); ?>
					</td></tr>
					</table>
					</td>
					<td> <?php echo $form->error($model,'endTime'); ?> </td>
				</tr>

				<tr>
					<td> <?php echo $form->labelEx($model,'location'); ?> <td>

					<td> <?php echo $form->textField($model,'location',array(
						'class'=>'vtextfield',
						)); ?>			

					</td>
				</tr>
				<script>

					var today = new Date();

					var date = today.getDate();
					var month = today.getMonth() + 1;
					var year = today.getYear() + 1900;

					var hour = today.getHours();
					var minutes = today.getMinutes();

					var position = hour ;
					
					if(minutes > 29){
						position = position + ":30" ;
					}else{
						position = position + ":00"
					}
					$('#startTime').val(position);

					var timestamp = today.getTime();

					$('#startDate').val(year + '-' + month + '-' + date);

					var nextHour = new Date(timestamp + (1*60*60*1000));
				
					date = nextHour.getDate();
					month = nextHour.getMonth() + 1;
					year = nextHour.getYear() + 1900;

					$('#endDate').val(year + '-' + month + '-' + date);

					var hour = nextHour.getHours();
					var minutes = nextHour.getMinutes();
					var position = hour ;
					if(minutes > 29){
						position = position + ":30" ;
					}else{
						position = position + ":00"
					}

					$('#endTime').val(position);

					var startTime = document.getElementById('startTime');
					$('#startsOnId').val($('#startDate').val() + " " + startTime.options[startTime.selectedIndex].text);
				</script>
</table>

