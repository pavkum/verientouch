<?php
header( 'refresh: 5; url=http://www.verientouch.com' );
$this->pageTitle=Yii::app()->name . " - Sign Up Success";

?>
<div id="signupheader">Sign Up Success</div>
<div id="container" style="height:400px">

	<p>Congratulations..!!! You have successfully completed the sign up process. You'll shortly receive an email from us. Please follow the instructions to verify your account.<p>

	<br>

	<br>

	<p> You will be redirected to home page in 5 sec. If you are not redirected for any reason please click <?php  echo CHtml::link('here',array('http://www.verientouch.com')) ?> </p>
</div>
