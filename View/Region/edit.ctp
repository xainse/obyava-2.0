<div class="admins form">
<?php echo $this->Form->create('Region');?>
<fieldset>
		<legend><?php printf (__('Edit %s', true), __('Region', true));?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('name_ru');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('Region.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('Region.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Regions', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	