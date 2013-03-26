<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
		
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
	</script>
	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/calendar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/month.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/create.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/firstTimeLogin.css" />

	<!--<?php Yii::app()->getClientScript()->registerCoreScript('yii'); ?>-->

	<!--<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?> -->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>





</head>

<body>


	
<!--
<script type="text/javascript" id="sourcecode">
$(function() {
    $('.calendarbody').jScrollPane({showArrows: true,autoReinitialise: false});
});
</script>

-->
<div class="container" id="page">
	
	<div class="header">

		<table>
			<td>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/abs_logo.PNG"  width="200px" height="75px"/>
			</td>

			<td>
				<!-- Login Button - White -->

				<?php
					if(Yii::app()->user->isGuest){
						$cookie = new CHttpCookie('loginredirect', "http://www.calendar.vereintouch.com");
						Yii::app()->request->cookies['loginredirect'] = $cookie;
						$this->redirect('http://www.accounts.verientouch.com');
					}else{
						echo "Welcome ".Yii::app()->user->name;
					}
				?>
			</td>

		</table>


	</div><!-- header -->




	<div class="calendarHeaderPanel">
		<table>
			<td>
				<!--<?php echo CHtml::button('create',array('class'=>'createbutton','onclick'=>'calendar/create'));

				?>-->
				<?php echo CHtml::button ("Create",array('submit' => array('calendar/create'),
									'class'=>'createButton'
									));?>
				
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
						<!--
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
						</td>-->
						<td><?php echo CHtml::button ("Week", array('submit' => array('calendar/week'),
									'class'=>'calendarTypeButtons'
									));?>
						</td>
						<td><?php echo CHtml::button ("Month", array('submit' => array('calendar/month'),
									'class'=>'calendarTypeButtons'
									));?>
						</td>
						<td><?php echo CHtml::button ("Agenda", array('submit' => array('calendar/agenda'),
									'class'=>'calendarTypeButtons'
									));?>
						</td>
						</table>
				</div>
			</td>
	
		</table>
	</div>

	<div class="ajax">

	</div>
	


	<?php echo $content; ?>

	<div class="clear"></div>

	

</div><!-- page -->

<!--
<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->


</body>
</html>
