<div class="overlay"></div>
<div class="modal">

	<script>
		var lastChoosenColorID = "";
	</script>	


	<div class="content">

		<div class="header" id="firstTimeLoginHeader">
			<table>
				<tr>
					<td>
						First Time : Create Calendar
					</td>
				</tr>
			</table>
		</div>

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'create-calendar-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
			'validateOnSubmit'=>true,
			),
		)); ?>

		<div class="form" id="data">
			<table>
				<tr>				
					<td> <?php echo $form->labelEx($model,'calendarName',array('class'=>'vLabel')); ?> </td>

					<td> <?php echo $form->textField($model,'calendarName',array(
						'class'=>'vtextfield',
						)); ?>
					</td>

					
				</tr>

				<tr>
					<td/>
					<td> <?php echo $form->error($model,'calendarName'); ?> </td>
				</tr>

				<tr>				
					<td> <?php echo $form->labelEx($model,'calendarDescription',array('class'=>'vLabel')); ?> </td>

					<td> <?php echo $form->textArea($model,'calendarDescription',array(
						'class'=>'vtextarea',
						)); ?>
					</td>

				</tr>

				<tr>
					<td/>
					<td> <?php echo $form->error($model,'calendarDescription'); ?> </td>
				</tr>

				<tr>
				<td > <?php echo $form->labelEx($model,'timezone'); ?> </td>

				<td > 
					<!--<div class="vdropdownlist">-->
					<?php echo $form->dropDownList($model,'timezone',$model->getTimeZoneArray(),
					array(
						'empty'=>'Timezone',
						'encode'=>1,
						'disabled'=>0,
						'promt'=>1,
						'class'=>'dropDownList',
						'style'=>'width:250px',
					)

					); ?>
					<!--</div>-->

				</td>

				</tr>

				<tr>
					<td/>
					<td> <?php echo $form->error($model,'timezone'); ?> </td>
				</tr>


				<tr>
				<td> <?php echo $form->labelEx($model,'calendarColor'); ?> </td>
				<?php echo $form->hiddenField($model,'calendarColor',array('id'=>'calendarColor')); ?>
				<td>
					<div>
					<span > <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#FF0000;border:1px solid #FF0000',
									'onclick' => 'choosenColor(\'FF0000\')',
									'id' => 'FF0000',
								)); ?> </span>

					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#008000;border:1px solid #008000',
									'onclick' => 'choosenColor(\'008000\')',
									'id' => '008000',
								)); ?> </span>

					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#00FFFF;border:1px solid #00FFFF',
									'onclick' => 'choosenColor(\'00FFFF\')',
									'id' => '00FFFF',
								)); ?> </span>

					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#FFD700;border:1px solid #FFD700',
									'onclick' => 'choosenColor(\'FFD700\')',
									'id' => 'FFD700',
								)); ?> </span>
					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#ADFF2F;border:1px solid #ADFF2F',
									'onclick' => 'choosenColor(\'ADFF2F\')',
									'id' => 'ADFF2F',
								)); ?> </span>
					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#D3D3D3;border:1px solid #D3D3D3',
									'onclick' => 'choosenColor(\'D3D3D3\')',
									'id' => 'D3D3D3',
								)); ?> </span>
					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#800080;border:1px solid #800080',
									'onclick' => 'choosenColor(\'800080\')',
									'id' => '800080',
								)); ?> </span>

					<span style="padding-left:10px"> <?php echo CHtml::button('',array(
									'class' => 'eventColorChooser',
									'style' => 'background:#EE82EE;border:1px solid #EE82EE',
									'onclick' => 'choosenColor(\'EE82EE\')',
									'id' => 'EE82EE',
								)); ?> </span>

						
						<script>
							function choosenColor(color){
								$("#"+color).css("-webkit-box-shadow","2px 2px 2px 2px #ccc");
								$("#"+color).css("-moz-box-shadow","2px 2px 2px 2px #ccc");
								$("#"+color).css("box-shadow","2px 2px 2px 2px #ccc");
								lastChoosenColorID = $('#calendarColor').val();

								if(lastChoosenColorID != color && lastChoosenColorID != ""){
									$("#"+lastChoosenColorID).css("-webkit-box-shadow","");
									$("#"+lastChoosenColorID).css("-moz-box-shadow","");
									$("#"+lastChoosenColorID).css("box-shadow","");
								}

								$('#calendarColor').val(color);
								alert($('#calendarColor').val());

							}
						</script>

					</div>
				</td>

			</tr>

				<tr>
					<td/>
					<td> <?php echo $form->error($model,'calendarColor'); ?> </td>
				</tr>

			<tr>
				<td/>

				<td align="right"> <?php echo CHtml::submitButton('Create',array(
							'class'=>'submitButton',
							'style'=>'align:right',
							//'id' => 'createEventId',
							
				)); ?> </td>
		
			</tr>
		</table>
	</div>

		<?php $this->endWidget(); ?>
	</div>
		
</div>
