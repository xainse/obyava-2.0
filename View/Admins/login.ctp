<!DOCTYPE html>
<html>
<head>
<?php 
	echo $this->Html->css(array('login.css'));
	echo $this->Html->script(array('jquery.1.8.2.min'));
?>
<title>Закрытая зона (Login)</title>
</head>
<body>
<script type="text/javascript">
$(document).ready(function () {
	var w_width  = $(window).width();
	//var w_height = $(window).height();
	var r_width = $(".registration_ref").width();
	//var r_height = $(".registration_ref").height();
	_left = (w_width - r_width)/2+10;
	//_top  = (w_height - r_height)/2+73;
	_top  = 10; 
	//alert(_left+":"+_top);	
	$(".registration_ref").css({left:_left, top:_top});
	
});
</script>

<!--[if IE]>
<style type="text/css">
div#centered {margin-top: expression(((document.documentElement.offsetHeight/2)
-parseInt(offsetHeight)/2)  <0 ? "0" : 
(document.documentElement.offsetHeight/2)
</style>
<![endif]-->
<div id="wrapper">
<?php wln($Auth);?>
<div id="centered">
	<?php echo $this->Form->create('Admin', array('action'=>$this->action))?>
	<?php echo $this->Form->input('login', array('label'=>'Login:', 'error'=>array('not_correct'=>'Error! Wrong login and/or password. Please try again.')))?>
	<?php echo $this->Form->input('password', array('label'=>'Password:'))?>
	<?php echo $this->Form->end('Enter')?></div>

</div>

<?php echo $this->element('sql_dump')?>

<script type="text/javascript">
	document.forms[0].elements['AdminLogin'].focus();
</script>
<div class="registration_ref"><a href="<?php echo $this->webroot?>registration">Registration</a></div>
</body>
</html>
