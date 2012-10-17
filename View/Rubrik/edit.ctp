<div class="admins form">
<?php echo $this->Form->create('Rubrik');?>
<fieldset>
		<legend><?php printf (__('Edit %s', true), __('Rubrik', true));?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('comment');
		echo $this->Form->input('template');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('Rubrik.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('Rubrik.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Rubriks', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	