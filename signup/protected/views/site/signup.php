<?php

$this->pageTitle=Yii::app()->name . " - Sign Up";

?>
<div id="signupheader">Sign Up</div>
<div id="container">
	
	<!--
	<div id="signupform" class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'signup-form',
		'enableClientValidation'=>false,
		'clientOptions'=>array(
		'validateOnSubmit'=>true,
		),
	)); ?>
	<table style="width:100%">
	<tr>
	<td>
	<div class="signuptable">
		<table>
			<tr>
				<td><?php echo $form->labelEx($model,'username'); ?></td>
				<td><?php echo $form->textField($model,'username',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'username'); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'password'); ?></td>
				<td><?php echo $form->passwordField($model,'password',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'password'); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'password_repeat'); ?></td>
				<td><?php echo $form->passwordField($model,'password_repeat',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'password_repeat'); ?></td>
			</tr>
	
			<tr>
				<td><?php echo $form->labelEx($model,'email_id'); ?></td>
				<td><?php echo $form->textField($model,'email_id',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'email_id'); ?></td>
			</tr>

		</table>

	</div>
	</td>	

	<td>
	<div class="signuptable">	
		<table>
			<tr>
				<td><?php echo $form->labelEx($model,'first_name'); ?></td>
				<td><?php echo $form->textField($model,'first_name',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'first_name'); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'last_name'); ?></td>
				<td><?php echo $form->textField($model,'last_name',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'last_name'); ?></td>
			</tr>
			<tr>
				<td><?php echo $form->labelEx($model,'gender'); ?></td>

				<td>
				<?php echo $form->dropDownList($model,'gender',$model->getGenderOptions(),array(
					'class'=>'vlist',
					))?>
				
				<!--<?php echo $form->radioButtonList($model,'gender', $model->getGenderOptions(),array(
					'class'=>'vradio',
					)); ?>-->
				<!--<?php echo $form->error($model,'gender'); ?></td>


			</tr>

			<tr>
				<td><?php echo $form->labelEx($model,'dob'); ?></td>

				<td><?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    					'name'=>'dob',
					'attribute'=>'dob',
					'model'=>$model,
					'value'=>$model->dob,
					    // additional javascript options for the date picker plugin
					    'options'=>array(
						    'showAnim'=>'fold',
						     //'showButtonPanel'=>true,
		   				     'yearRange'=>'-43:+0',
 					             'changeYear'=>'true',
	       					     'changeMonth'=>'true',
   					 	     'autoSize'=>true,
					             'dateFormat'=>'yy-mm-dd',
					             'defaultDate'=>$model->dob,	
					    ),
					    'htmlOptions'=>array(
					    'style'=>'height:20px; width:250px'
					    ),
					));
					?>					
					

				<?php echo $form->error($model,'dob'); ?></td>
			</tr>

		</table>
	</div>
	</td>
	</tr>
	<tr>
		<td>	<div class="signuptable">
			<table>	<td><?php echo $form->labelEx($model,'location'); ?></td>
				<td><?php echo $form->textField($model,'location',array(
					'class'=>'vtextfield',
					)); ?>
				<?php echo $form->error($model,'location'); ?></td></table>
		</div></td>

	</tr>
	
	
	</table>	
			

	<?php if(CCaptcha::checkRequirements()): ?>
		<div class="signupcaptcha">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<div>
				<?php $this->widget('CCaptcha'); ?>
				<?php echo $form->textField($model,'verifyCode',
					array(
					'class'=>'vtextfield',
					)
				); ?>
			</div>
				<div class="hint">Please enter the letters as they are shown in the image above.
				<br/>Letters are not case-sensitive.</div>
				<?php echo $form->error($model,'verifyCode'); ?>
			</div>
			<?php endif; ?>
			

			<span class="signupbutton">
			
				<?php echo CHtml::submitButton('Sign Up',array(
					'class'=>'submitbutton',
					)); ?>
			
			</span>
		</div>
		
		<?php $this->endWidget(); ?>
	</div><!-- form -->

	<div id="signupform" class="form">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'signup-form',
			'enableClientValidation'=>false,
			'clientOptions'=>array(
			'validateOnSubmit'=>true,
			),
		)); ?>
	
		<?php echo $form->errorSummary($model); ?>

		<div class="section">
			<div class="sectionHeading"> Account Information </div>
			</hr/>
			
			<table>
				<td> <?php echo $form->labelEx($model,'username'); ?> <td>

				<td> <?php echo $form->textField($model,'username',array(
						'class'=>'vtextfield',
						)); ?>			

				</td>
			</table>

			<div  class="errorDisplay">
				<?php $form->error($model,'username'); ?>
			</div>

			<table>
				<td> <?php echo $form->labelEx($model,'password'); ?> <td>

				<td> <?php echo $form->passwordField($model,'password',array(
						'class'=>'vtextfield',
						)); ?>			

				</td>
			</table>

			<table>
				<td> <?php echo $form->labelEx($model,'password_repeat'); ?> <td>

				<td> <?php echo $form->passwordField($model,'password_repeat',array(
						'class'=>'vtextfield',
						)); ?>			

				</td>
			</table>

			<table>
				<td> <?php echo $form->labelEx($model,'email_id'); ?> <td>

				<td> <?php echo $form->textField($model,'email_id',array(
						'class'=>'vtextfield',
						)); ?>			

				</td>
			</table>

		</div>		

		<div class="sectionSeparator"></div>

		<div class="section">
			<div class="sectionHeading"> Personal Information </div>
			</hr/>
			
			<table>
				<td> <?php echo $form->labelEx($model,'first_name'); ?> <td>

				<td> <?php echo $form->textField($model,'first_name',array(
						'class'=>'vtextfield',
						)); ?>			

				</td>
			</table>

			<table>
				<td> <?php echo $form->labelEx($model,'last_name'); ?> <td>

				<td> <?php echo $form->textField($model,'last_name',array(
						'class'=>'vtextfield',
						)); ?>			

				</td>
			</table>

			<table>
				<td style="width:50%"> <?php echo $form->labelEx($model,'gender'); ?> </td>

				<td> 
					<div class="compactRadioGroup">
					<?php echo $form->radioButtonList($model, 'gender',
                 			   array(   0 => 'Male',
                          			    1 => 'Female',
                        		   ),
                    			   array( 'separator' => "  "
					   ) ); ?>
					</div>			

				</td>
			</table>

			<table>

				<td > <?php echo $form->labelEx($model,'dob'); ?> </td>

				<td><?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
    					'name'=>'dob',
					'attribute'=>'dob',
					'model'=>$model,
					'value'=>$model->dob,
					    // additional javascript options for the date picker plugin
					    'options'=>array(
						    'showAnim'=>'fold',
						     //'showButtonPanel'=>true,
		   				     'yearRange'=>'-43:+0',
 					             'changeYear'=>'true',
	       					     'changeMonth'=>'true',
   					 	     'autoSize'=>true,
					             'dateFormat'=>'yy-mm-dd',
					             'defaultDate'=>$model->dob,	
					    ),
					    'htmlOptions'=>array(
					    'style'=>'height:20px; width:250px'
					    ),
					));?>
				</td>
			</table>

			<table >

				<td style="width:50%"> <?php echo $form->labelEx($model,'location'); ?> </td>

				<td > 
					<div class="vdropdownlist">
					<?php echo $form->dropDownList($model,'location',$model->getCountryList(),
					array(
						'empty'=>'Choose Country',
						'encode'=>1,
						'disabled'=>0,
						'promt'=>1,
						'key'=>'a',
					)
					); ?>
					</div>

				</td>

			</table>

		</div>
		<div class="sectionSeparator"></div>
		<div class="section">
			<div class="sectionHeading"> Human Verification </div>
			<div class="captcha">			
				<table>
				
					<td>			
				
						<?php $this->widget('CCaptcha',
						array('buttonType'=>'button',
							'buttonOptions'=> array(
								'id'=>'cbutton',
								//'style'=>'display:block; border:1px solid white; background:grey; color:white',
								'class'=>'captchaButton',

							),
						)
						); ?> 
					

					</td>

					<td>
						<?php echo $form->textField($model,'verifyCode',
							array(
							'class'=>'vtextfield',
							)
						); ?>
						<div class="hint">Please enter the letters as they are shown in the image above.
						<br/>Letters are not case-sensitive.</div>
					</td>
				</table>
			</div>
		</div>
		<div class="sectionSeparator"></div>
		<div>
			<span class="signupbutton">
			
				<?php echo CHtml::submitButton('Sign Up',array(
					'class'=>'submitbutton',
					)); ?>
			
			</span>
		</div>

		<?php $this->endWidget(); ?>


</div>
