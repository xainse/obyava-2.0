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
</menu>
</div>


<div class="right-menu">
	<h3 class="title"><i class="icon big_icon-organization"></i>Каталог Організцій</h3>
</div>


	<?php foreach ($last_ads as $item):?>
	<?php echo $this->element('ads/one-ad', array('i' => $item));?>
	<?php endforeach;?>

	<?php /*
	<div class="b_one-ads">
		<h4 class="category">Продам квартирку</h4>

		<p class="b_one-ads_ads-text"><b>*1к квартира</b>, новострой, центр Донецка, евроремонт, мебель,техника.</p>
		
		<ul class="b_one-ads_det">
			<li class="li"><a class="link hasImages" href="#"><i class="sml_icon sml_icon-img"></i></a></li>
			<li class="li"><a class="link hasLocations" href="#"><i class="sml_icon sml_icon-location"></i></a></li>
			<li class="li hasPhone"><i class="sml_icon sml_icon-phone"></i> 050-411-26-68</li>
		</ul>
		<div class="b_one-ads_share">
			<span class="created-time"><i class="sml_icon sml_icon-time"></i>29.11.2012</span>
			
			<ul class="soc-share">
				<li class="li eye-count"><i class="sml_icon sml_icon-eye"></i>&nbsp;1498</li>
				<li class="li"><a href="#ссылка_зашарить_все_в_твиттер"><i class="sml_icon sml_icon-tw"></i></a></li>
				<li class="li"><a href="#ссылка_зашарить_все_в_твиттер"><i class="sml_icon sml_icon-vk"></i></a></li>
				<li class="li"><a href="#ссылка_зашарить_все_в_твиттер"><i class="sml_icon sml_icon-fb"></i></a></li>
			</ul>
		</div>
	</div>

	<?php endfor;?>


	*/?>





<script type="text/javascript" src="http://over-layout.dev/js/upper.layer.js"></script>
<script type="text/javascript">
	upperLayout.setup({maketImg: 'img/maket.jpg'});
</script>



