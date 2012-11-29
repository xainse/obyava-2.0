<?php if (!empty($i)):?>
<div class="b_one-ads">
	<h4 class="category"><?php echo $i['Rubrik']['name']?></h4>
	<p class="b_one-ads_ads-text"><?php echo $i['Ad']['text']?></p>	
	<ul class="b_one-ads_det">
		<li class="li"><a class="link hasImages" href="#"><i class="sml_icon sml_icon-img"></i></a></li>
		<li class="li"><a class="link hasLocations" href="#"><i class="sml_icon sml_icon-location"></i></a></li>
		<li class="li hasPhone"><i class="sml_icon sml_icon-phone"></i> 050-411-26-68</li>
	</ul>
	<div class="b_one-ads_share">
		<span class="created-time"><i class="sml_icon sml_icon-time"></i><?php echo $i['Ad']['date']?></span>
		
		<ul class="soc-share">
			<li class="li eye-count"><i class="sml_icon sml_icon-eye"></i>&nbsp;1498</li>
			<li class="li"><a href="#ссылка_зашарить_все_в_твиттер"><i class="sml_icon sml_icon-tw"></i></a></li>
			<li class="li"><a href="#ссылка_зашарить_все_в_твиттер"><i class="sml_icon sml_icon-vk"></i></a></li>
			<li class="li"><a href="#ссылка_зашарить_все_в_твиттер"><i class="sml_icon sml_icon-fb"></i></a></li>
		</ul>
	</div>
</div>
<?php endif;?>