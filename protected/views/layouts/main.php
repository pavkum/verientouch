<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/button.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/index.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/about.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/contact.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!--<div class="container" id="page">-->

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		
	</div><!-- header -->
	<!--<?php	$this->widget('application.extensions.MyButton',
	   	array('label'=>"Home",'path'=>"/site/index",'marginleft'=>"10%",'borderleft'=>"0",
		   ));
		$this->widget('application.extensions.MyButton',
	   	array('label'=>"About",'path'=>"/site/about",'marginleft'=>"0",
		   ));
		$this->widget('application.extensions.MyButton',
	   	array('label'=>"Contact",'path'=>"/site/contact",'marginleft'=>"0",
		   ));
	?>
	-->
	
	<div id="mainmenu">

		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Calendar', 'url'=>array('/site/calendar')),
				array('label'=>'About', 'url'=>array('/site/about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				
			),
			'lastItemCssClass'=>'lastItemCssClass',
		)); ?>
		
	</div><!-- mainmenu -->
	

	<div id="pagebody">
		<?php echo $content; ?>
		
		<div id="footer">
			<!--Copyright &copy; <?php echo date('Y'); ?> verientouch<br/>
			All Rights Reserved.<br/>-->
			<?php echo Yii::powered(); ?>
		</div><!-- footer -->


	</div>
	<!--<div class="clear"></div>-->

	
<!--</div><!-- page -->

</body>
</html>
