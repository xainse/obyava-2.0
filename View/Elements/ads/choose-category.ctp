<ul class="b_category-block">
<li class="popup-title"><h3><?php echo __('Виберіть категорію об*яви')?></h3></li>
<?php $subCat1stLevel = array();?>
<?php foreach($categories as $cat_id=>$cat_label): 
		if (is_array($cat_label)): ?>
		<li class="cat_title"><?php echo $cat_id ?></li>	
		<?php if (is_array($cat_label)): ?>
			<li class="li">
			<?php echo $this->Form->radio('cat_id', $cat_label, array('separator' => '</li><li class="li">', 'legend' => false));?>
			</li>	
		<?php else: ?>			
		<?php $subCat1stLevel[$cat_id] = $cat_label?>
		<?php endif; ?>
		<?php else: ?>
		<?php $subCat1stLevel[$cat_id] = $cat_label?>
	<?php endif; ?>	
<?php endforeach; ?>
<li class="li">
<?php echo $this->Form->radio('cat_id', $subCat1stLevel, array('separator' => '</li><li class="li">', 'legend' => false));?>
</li>
</ul>