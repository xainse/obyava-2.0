
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">

			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse"> <span class="icon-bar"></span> <span
				class="icon-bar"></span> <span class="icon-bar"></span> </a>

			<!-- Be sure to leave the brand out there if you want it shown -->
			<a class="brand" href="#">Адміністративна частина:</a>

			<!-- Everything you want hidden at 940px or less, place within here -->
			<div class="nav-collapse">
				<!-- .nav, .navbar-search, .navbar-form, etc -->
				<ul class="nav nav-tabs">
				    <li class="active"><a href="<?php echo $this->webroot?>gate/admins/dashboard/">Головна сторінка</a></li>
				    <li class="dropdown">
				    	<a class="dropdown-toggle" href="#"><?php echo __('Редагування')?> <b class="caret"></b></a>
				    	<ul class="dropdown-menu">
                          <li><?php echo $this->Html->link(__('Адміністратори', 1), array('controller' => 'admins', 'action'=>'index'), array())?> </li>
                          <li><a href="<?php echo $this->webroot?>gate/users/"><?php echo __('Користувачі')?></a></li>                          
                          <li class="divider"></li>
                          <li class="nav-header"><?php echo __('Контент сайту')?></li>
                          <li><a href="<?php echo $this->webroot?>gate/ads/"><?php echo __('Оголошення')?></a></li>
                          <li><a href="<?php echo $this->webroot?>gate/rubriks/"><?php echo __('Рубрики')?></a></li>
                          <li><a href="<?php echo $this->webroot?>gate/regions/"><?php echo __('Міста')?></a></li>
                          <li><a href="#"><?php echo __('Телефонний довідник')?></a></li>
                        </ul>
				    </li>
				    <li><a href="#">...</a></li>
			    </ul>
			</div>

		</div>
	</div>
</div>


<script type="text/javascript">
$(function(){
	$('.dropdown-toggle').dropdown();
});
</script>
