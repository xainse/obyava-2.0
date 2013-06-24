<div class="ad-edit-form">
<h3>Додати об*яву</h3>
<?php echo $this->Form->create('Ad');?>
<?php echo $this->Form->input('region_id', array('label' => 'Регіон об*яви:', 'type'=>'select', 'empty' => '-Виберіть регіон-', 'options' => $regions));?>
<?php echo $this->Form->input('category_id', array('label' => 'Виберіть рубрику:', 'type'=>'select', 'empty' => '-Виберіть рубрику-', 'options' => $categories));?>
<?php echo $this->Form->input('text', array('label' => 'Текст об*яви:', ))?>
<?php echo $this->Form->input('contacts', array('label' => 'Ваш адрес или телефон:', ))?>

<?php echo $this->Form->input('confirm_rules', array('type'=>'checkbox', 'label' => $this->Html->link('Погоджуюсь з правилами публікації', 'terms.html'))); ?>


<?php echo $this->Form->button('Зберегти', array('type'=>'submit'))?>
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


