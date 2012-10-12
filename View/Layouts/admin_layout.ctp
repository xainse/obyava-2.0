<?php echo $this->Html->docType('html5')?>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>	
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.min', 'admin-style'));
		echo $this->Html->script(array('jquery.1.8.2.min', 'bootstrap.min'));
		
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
	<?php echo $this->element('admin-top-nav');?>
	<div id="container" class="page-wrap">
			
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
		
	</div>
</body>
</html>