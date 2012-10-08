<?php echo $this->Html->docType('html5')?>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>	
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min', 'obyava-style'));
		echo $this->Html->script(array('jquery.1.8.2.min'));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
      document.createElement('menu');
   </script>
<![endif]-->

</head>
<body>
	<div id="container" class="page-wrap">
	<?php echo $this->element('top-nav')?>
		<header class="header">
			
		</header>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
