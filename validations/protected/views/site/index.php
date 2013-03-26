<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . " - Email Verification";
?>

<div id="validationheader">Email Verification</div>

<?php echo Yii::app()->request->getParam("key"); ?>
