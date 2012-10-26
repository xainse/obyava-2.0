<div class="admins form">
<?php echo $this->Form->create('User');?>
<fieldset>
		<legend><?php printf (__('Edit %s', true), __('User', true));?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('login');
		echo $this->Form->input('email');
		echo $this->Form->input('password', array(
			'type'=>'password',
			'class'=>'short text',
			'error'=>array(
				'notempty'		=> __('This field cannot be left blank',true),
				'length'		=> __('Password cant be less than 5 characrets', true),
				'alphaNumeric'	=> __('password need to be aplhanumeric', true),
				'equal'			=> __('Password & configuration fields are not equal', true),
				'confirm'		=> __('Please, confirm your password', true),
			),
			'value' => '',
		));
		echo $this->Form->input('confirm_password', array('type'=>'password','class'=>'short text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	