<table class="repeatEvent">


	<tr>
		<td> <?php echo $form->labelEx($model,'repeat'); ?> </td>
		<td>
					<?php echo $form->dropDownList($model,'repeat',$model->getRepeat(),
					array(
						'default' => 0,
						'encode'=>1,
						'disabled'=>0,
						'promt'=>1,
						'class'=>'dropDownList',
						'style' => 'width:250px',
						'onchange' => 'changeRepeatCriteria()',
						'id' => 'repeatCriteriaId',
					)
					); ?>
		</td>
		
			<script>
				function changeRepeatCriteria() {
					var value = $('#repeatCriteriaId').val();
					
					if(value == 0){
						$('.never').hide();
					}else{
						$('.never').show();
						changeEndCriteria();
						if(value == 2){
							$('#weekList').show();
						}else{
							$('#weekList').hide();
						}

						if(value == 5){
							$('#monthList').show();
						}else{
							$('#monthList').hide();
						}
						
					}
				}
			</script>

	</tr>

	<tr id="weekList" class="never">
		<td> <?php echo $form->labelEx($model,'weekRepeatOn'); ?> </td>
		<td>
			<?php echo $form->checkBoxList($model, 'weekRepeatOn', $model->getWeekRepeatOn() ,array('separator'=>' ',));?>
		</td>
	</tr>

	<script>
		$('#weekList').hide();
	</script>

	<tr id="monthList" class="never">
		<td> <?php echo $form->labelEx($model,'monthRepeatOn'); ?> </td>
		<td>
			<?php echo $form->checkBoxList($model, 'monthRepeatOn', $model->getMonthRepeatOn() ,array('separator'=>' ',));?>
		</td>
	</tr>


	<script>
		$('#monthList').hide();
	</script>

	<tr class="never">
		<td> <?php echo $form->labelEx($model,'startsOn'); ?> </td>
		<td>
			<?php echo $form->textField($model,'startsOn',array(
				'class'=>'vtextfield',
				'disabled'=> 1,
				'id' => 'startsOnId'
			)); ?>			
		</td>

	</tr>

	<tr class="never">
		<td> <?php echo $form->labelEx($model,'endCriteria'); ?> </td>
		

				<td>	<?php echo $form->dropDownList($model,'endCriteria',$model->getEndOptions(),
					array(
						'encode'=>1,
						'disabled'=>0,
						'promt'=>1,
						'default'=>0,
						'class'=>'dropDownList',
						'style' => 'width:250px',
						'onchange' => 'changeEndCriteria()',
						'id' => 'endCriteriaValue',
					)
					); ?>
				</td>

				<script>
					function changeEndCriteria() {
						var value = $('#endCriteriaValue').val();

						if(value == 2){
							$('#endson').show();
							$('#endsafter').hide();
						}else if(value == 3){
							$('#endson').hide();
							$('#endsafter').show();
						}else{
							$('#endson').hide();
							$('#endsafter').hide();
						}

						return false;
					}

					$('#endson').hide();
					$('#endsafter').hide();

				</script>

	</tr>

	<tr id="endson" class="never">
		<td>
			<?php echo $form->labelEx($model,'endsOn'); ?>
		</td>

		<td>
			<?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    					'name'=>'endsOn',
					'attribute'=>'endsOn',
					'model'=>$model,
					'value'=>$model->endsOn,
					    	    'options'=>array(
						    'showAnim'=>'fold',
						     'showButtonPanel'=>false,
   					 	     'autoSize'=>true,
					             'dateFormat'=>'yy-mm-d',
					             'defaultDate'=>$model->endsOn,	
					    ),
					    'htmlOptions'=>array(
						'class'=>'vtextfield',
					    'style'=>'width:250px'
					    ),
					));?>
		</td>

	</tr>

	<tr id="endsafter" class="never">
		<td> <?php echo $form->labelEx($model,'endsAfter'); ?> </td>

		<td> <?php echo $form->textField($model,'endsAfter',array(
						'class'=>'vtextfield',
						'value' => '50',
						)); ?>			

		</td>
	</tr>

	<script>
		//$('#endson').hide();
		//$('#endsafter').hide();
		$('.never').hide();
	</script>
	
</table>
