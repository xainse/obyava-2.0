<div class="ad-edit-form">
<h3>Додати об*яву</h3>
<?php echo $this->Form->create('Ad');?>
<?php echo $this->Form->input('category_id', array('label' => 'Виберіть рубрику:', 'type'=>'select', 'options' => $categories));?>

<?php echo $this->Form->end();?>
</div>


<style type="text/css">
.ad-edit-form {
	width: 600px;
	height: 500px;
	padding: 20px;
	position: relative;
	margin: 0 auto;
	border: 2px solid #3B3830;
	border-radius: 5px;
}
</style>


