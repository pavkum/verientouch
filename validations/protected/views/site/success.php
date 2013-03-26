<?php
header( 'refresh: 5; url=http://www.verientouch.com' );
$this->pageTitle=Yii::app()->name . ' - Email Verified';

?>
<div id="validationheader">Email Verified successfully</div>
<div id="container" style="height:400px">
	<p> Your Email has been validated successfully. You'll be redirected to login page automatically in 5 seconds.<p>
	<br>
	<p> If you are not redirected for any reason please click <?php echo CHtml::link('here',array('signup')); ?> </p>

</div>
