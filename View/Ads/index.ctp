<div class="menu-filter-wrap">
<menu class="b_main-category-filter">
	<li class="li">
		<a href="#" class="link"><i class="icon big_icon-immovables"></i>Нерухомість</a>
	</li>
	<li class="li auto-category">
		<a href="#" class="link"><i class="icon big_icon-auto"></i>Авто-мото</a>
	</li>
	<li class="li">
		<a href="#" class="link"><i class="icon big_icon-other"></i>Інше</a>
	</li>
	<li class="li li-count-wrap">
		<div class="selected_ads_count" id="selected_ads_count">3 <i class="selected_ads_count-tail"></i></div>
	</li>
</menu>
</div>

<!--  
 	<div class="right-menu" >
		<h3 class="title"><i class="icon big_icon-organization"></i>Каталог Організцій</h3>
	</div>
-->
<div class="index-das-wrap" id="content">
	<?php //$i = 0; 
	if (!empty($last_ads)) {
		foreach ($last_ads as $key => $item):
		if ($key == 3) {
			echo $this->element('ads/category-block');
		}
		echo $this->element('ads/one-ad', array('i' => $item));
	endforeach;	
	}	
	?>
</div>



<script type="text/javascript" src="http://over-layout.dev/js/upper.layer.js"></script>
<script type="text/javascript">
	upperLayout.setup({maketImg: 'img/maket.jpg'});
</script>



