<?php //we($last_ads);?>

<div class="top-ads-block-search">
	    <div class="navbar navbar-inverse">
    		<div class="navbar-inner">
    			<div class="container">
    			
    			<ul class="nav home-filter">
					<li><?php echo $this->Html->link('Нерухомість', array('controller' => 'ads', 'action'=> 'filter', '1'))?></li>
					<li><?php echo $this->Html->link('Авто-мото', array('controller' => 'ads', 'action'=> 'filter', '2'))?></li>
					<li><?php echo $this->Html->link('Все для дому', array('controller' => 'ads', 'action'=> 'filter', '3'))?></li>
				</ul>
         		
		         <form class="navbar-search pull-left">
			    	<input type="text" class="search-query" placeholder="Search">
			    </form>
    		</div>
    	</div>
    </div>	
</div>

<div class="b_ads-home">

<?php if (!empty($last_ads)):?>
<?php foreach ($last_ads as $one_ad):?>
	<div class="one-ad">
		<?php echo $this->Html->link("#".$one_ad['Ad']['id'], array('controller' =>'ads', 'action'=>'view', $one_ad['Ad']['id']), array('class' => 'sml-ad'))?>
		<span><?php echo date('d.m.Y', strtotime($one_ad['Ad']['id']))?></span>
		<h5><?php echo $one_ad['Rubrik']['name']?></h5>
		<div class="sml-ad-text">
			<?php echo $one_ad['Ad']['text']?>
		</div>
	</div>
<?php endforeach;?>
<?php endif;?>

</div>

<div class="b_right-panel">
	<h3>Справочник:</h3>
</div>