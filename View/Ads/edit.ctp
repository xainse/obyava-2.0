

<?php //echo $this->element('ads/ad-edit-form');?>

<script type="text/javascript">
$(function(){ 
	// winManager.freezePage(); 
});
</script>


<ul class="b_category-block">

<?php foreach($categories as $cat_id=>$cat_label): 
	if (is_array($cat_label)): ?>
	<li class="li cat_title"><?php echo $cat_id ?></li>	
	<?php if (is_array($cat_label)): ?>
		<?php foreach ($cat_label as $subcatid=>$subcat_title):?>
		<li class="li">
		<?php echo $this->Form->input('cat_id', array('label'=>$subcat_title, 'type'=>'checkbox', 'value' => $subcatid));?>
		</li>			
		<?php endforeach;?>		
	<?php else: ?>
			<?php echo $this->Form->input('cat_id', array('label' => $cat_label, 'type'=>'checkbox', 'value' => $cat_id));?>
		<?php endif; ?>
	<?php endif; ?>	
<?php endforeach; ?>
</ul>

<style type="text/css">
.b_category-block {
	position: absolute; 
	top: 10px;
	left: 10px;
	z-index: 1001;
	
	width: 790px;
	min-height: 300px;
	padding: 26px;
	
	background: #FFF;
	border: 1px solid #dce0e6;
	border-radius: 4px; 
}
</style>