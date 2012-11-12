<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
	
    	<div class="b_count">
	    	<i class="num1">на <?php echo date('d') .' '.@$manth?>:</i>
	    	<i class="num2"> <?php echo $count_ads?></i>
	    	<i class="num3">Актуальних <span>Оголошень</span></i>
    	</div>
    	
    	<div class="b_top_search">
	    	<?php echo $this->Form->create('Ad')?>		    	
		    	<?php echo $this->Form->input('q', array('label'=>false, 'class'=>'q-search', 'div'=>false, 'placeholder'=>"Например: ищу 1к. квартиру, Пацаева"))?>		    	
		    	<input type="submit" src="<?php echo $this->webroot;?>img/interface/btn/btn-search.png" class="q-submit" value="" />
		    <?php echo $this->Form->end()?>
	    </div>
	    
	    <div class="b_add-ads">
	    	<a class="add-btn" href="<?php echo $this->webroot?>ads/add"><i class="icon-plus"></i>Додати оголошення</a>
	    </div>
	</div>
</div>