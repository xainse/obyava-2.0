<div class="admins form">
<?php echo $this->Form->create('Rubrik');?>
<fieldset>
		<legend><?php printf (__('Edit %s', true), __('Rubrik', true));?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('name');
		echo $this->Form->input('title2', array('label' => 'Альтернативне ім*я категорії, зрозуміле людям:'));
		echo $this->Form->input('comment');
		echo $this->Form->input('template');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
$(function(){    
       $.get( '/ads/index/, function(server_response) {
                  alert(server_response);
       });  // AJAX 
}):
</script>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('Rubrik.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('Rubrik.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Rubriks', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	