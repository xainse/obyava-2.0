<div class="admins form">
<?php echo $this->Form->create('Ad');?>
<fieldset>
		<legend><?php printf (__('Edit %s', true), __('Ad', true));?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rubrik_id');
		echo $this->Form->input('text');
		echo $this->Form->input('date');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('Ad.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('Ad.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Ads', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	