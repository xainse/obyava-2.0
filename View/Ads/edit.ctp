

<?php //echo $this->element('ads/ad-edit-form');?>

<script type="text/javascript">
$(function(){ 
	// winManager.freezePage(); 
});
</script>

<?php we($categories);?>

<ul class="b_category-block">
<?php $subCat1stLevel = array();?>
<?php foreach($categories as $cat_id=>$cat_label): 
		if (is_array($cat_label)): ?>
		<li class="li cat_title"><?php echo $cat_id ?></li>	
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
	display: table;
}
	.b_category-block .li {padding:0; margin: 0; list-style: none;}
	.b_category-block .li.cat_title { width: 100%; height: auto; background: transparent; border: 0; font-weight: bold;}
	
	.b_category-block .li {
		float: left;
		width: 130px;
		height: 45px;
		padding: 0 10px 0 13px;
		background-color: #fbfbfb;
		border: 2px solid #FFF;
		border-width: 0 2px 2px 0;		
		display: inline-table;
	}
		.b_category-block .li label {
			vertical-align: middle;
			height: 55px;
			display: table-cell;
			padding: 0 0 0 5px;
			line-height: 10px;
			font-size: 12px;
			color: #52606b;
		}
		.b_category-block .li input {
			margin: 20px 0 0;
		}

</style>