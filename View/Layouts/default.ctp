<?php echo $this->Html->docType('html5')?>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>	
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('obyava-style', 'font-awesome'));
		echo $this->Html->script(array('jquery.1.10.2.min', 'adsboard', 'win.manager', 'obyava.ai'));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');		
	?>
<!--[if IE 7]><link type="text/css" rel="stylesheet" href="<?php echo $this->webroot?>css/font-awesome-ie7.css" /><![endif]-->
<?php echo $this->element('ieHTML5tags')?>

</head>
<body>
	<div id="container" class="page-wrap">	
		<header class="header">
			<a href="<?php echo $this->webroot?>" class="home-link">
				<?php echo $this->Html->image('interface/obyava-logo-main.png')?>
			</a>
			<?php echo $this->element('top-nav')?>
		</header>
		<div id="content_">		
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>			
		</div>
		
		<div id="footer">		
			<ul>
				<li>Счетчики</li>
				<li><?php echo $this->Html->link('Designed by Maximuz', 'https://vk.com/id7475588', array('id'=>'maximus'))?></li>
				<li><?php echo $this->Html->link('Умови використання', $this->webroot.'terms.html', array('id'=>'terms-of-use', 'target' => '_blank'))?></li>
			</ul>
		</div>
	</div>
<!-- Scripts init -->
<script type="text/javascript">
$(function(){ 
	Ad.setup(); 
});
</script>

<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
