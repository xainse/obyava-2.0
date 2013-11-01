

<?php echo $this->element('ads/ad-edit-form');?>

<script type="text/javascript">
$(function(){ 
	// winManager.freezePage(); 
});
</script>

<?php //echo $this->element('ads/choose-category', array('categories'=>$categories))?>

<style type="text/css">
.b_category-block {
	position: absolute; 
	top: 10px;
	left: 10px;
	z-index: 1001;
	
	width: 775px;
	min-height: 300px;
	padding: 26px;
	
	background: #FFF;
	border: 1px solid #dce0e6;
	border-radius: 4px; 
	display: table;
}
	.b_category-block .li, .b_category-block .cat_title {padding:0; margin: 0; list-style: none;}
	.b_category-block .cat_title {float: left; width: 100%; height: auto; background: transparent; border: 0; font-weight: bold;}
	
	.b_category-block .li {
		float: left;
		width: 130px;
		height: 45px;
		padding: 0 10px 0 13px;
		background-color: #fbfbfb;		
		margin: 0 2px 2px 0;		
		display: inline-table;
		border-radius: 2px;
		color: #3B3830;
	}
	.b_category-block .li:hover {
		background-color: #3B3830;
		color: #FFF;
	}
		.b_category-block .li label {
			vertical-align: middle;
			height: 100%;
			display: table-cell;
			padding: 0 0 0 5px;
			line-height: 11px;
			font-size: 12px;
			cursor: pointer;			
		}
		.b_category-block .li input {
			margin: 15px 0 0;
		}

</style>