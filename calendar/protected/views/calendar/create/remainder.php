<table>
	
	<script>
		$(document).ready(function() {


		});

		var remainderMap = new Hashtable();

	</script>
	<tr>

		<td>
			<?php echo CHtml::textField('remainderTime', '' ,array(
				'class' => 'vTextField',
				'style' => 'width:100px;height:27px;margin:0;padding:0'
				//'onenter'=> 'addGuestEmail()',
			)); ?>

			<?php
				echo $form->hiddenField($model,'remainder',array('id'=>'remainder'));
			?>
			<script>
				$('#remainder').val('-1');
			</script>
		</td>

		<td>
			<?php echo $form->dropDownList($model,'remainderDuration',$model->getRemainderDurationType(),
				array(
					'default' => 0,
					'encode'=>1,
					'disabled'=>0,
					'promt'=>1,
					'class'=>'dropDownList',
					'id'=>'remainderDuration',
				)
			); ?>
		</td>



		<td>
			<?php echo $form->dropDownList($model,'remainder',$model->getRemainderTypes(),
				array(
					'default' => 0,
					'encode'=>1,
					'disabled'=>0,
					'promt'=>1,
					'class'=>'dropDownList',
					'id' => 'remainderType',
				)
			); ?>
		</td>

		<td>
			<?php echo CHtml::button('Add',array(
				'class' => 'vButton',
				'onclick' =>'addRemainder()'
			)); ?>

			<script>
				function addRemainder() {

					var value = $('#remainderTime').val();

					if(validateTextFieldValue(value)){
						
						var remainderDurationType = document.getElementById('remainderDuration');
						remainderDurationType = remainderDurationType.options[remainderDurationType.selectedIndex].text;

						var remainderType = document.getElementById('remainderType');
						remainderType = remainderType.options[remainderType.selectedIndex].text;

						var table = document.getElementById('userRemainder');
						var row = table.insertRow(0);
						var columnRemainderDuration = row.insertCell(0);
						var columnRemainderDurationType = row.insertCell(1);
						var columnRemainderType = row.insertCell(2);
						var removeButton = row.insertCell(3);

						var button = document.createElement('input');
						button.type = 'button';
						button.value = 'Remove';
						button.id = value + '-button';
						button.name = 'remove';
						button.className = 'removeButton';
						button.onclick = function() {
									var userElement = document.getElementById(value);
									userElement.parentNode.removeChild(userElement);
									remainderMap.remove(value);		
									return false;
									};

						row.className = 'userRemainderRow';
						row.id = value;

						columnRemainderDuration.className = 'userRemainderColumn';
						columnRemainderDuration.innerHTML = value;
	
						columnRemainderDurationType.className = 'userRemainderColumn';
						columnRemainderDurationType.innerHTML = remainderDurationType;

						columnRemainderType.className = 'userRemainderColumn';
						columnRemainderType.innerHTML = remainderType;

						removeButton.appendChild(button);
						value = value + ":" + remainderDurationType + ":" + remainderType;
						remainderMap.put(value,value);
						updateRemainderArray();

						$('#remainderTime').val('');
						$('#errorRemainder').text('');

						

					}else{

					}

					return false;
				}

				function validateTextFieldValue(value){
					var regex = /\d+/; 					
					if(regex.test(value)){
						if(value <= 0){
							$('#errorRemainder').text('Please enter valid +ve non-zero integer');
							return false;
						}
					
					return true;
					}else{
						$('#errorRemainder').text('Please enter valid +ve non-zero integer');
						return false;
					}
				}

				function updateRemainderArray(){
					var remainderArray = remainderMap.values();
					
					$('#remainder').val(remainderArray);
					return false;
				}

			</script>

		</td>

	</tr>

	<tr>
		<td>
			<div id="errorRemainder" style="color:red; text-align:center">

			</div>

		</td>
	</tr>


</table>


<table id="userRemainder">


</table>
