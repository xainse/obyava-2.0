<div class="admins form">
<?php  echo $this->Form->create('Ad');?>
<legend><?php printf (__('Edit %s', true), __('Ad', true));?></legend>

	<div class="b_form_left">		
	<?php 
		/* echo $this->Form->input('DetailsAuto.color', array('label'=>'Колір автомобіля''type'=>'select', 'options'=>$last_ads, 'selected'=>@$this->data['Ad']['DetailsAuto']['color'])); */
		echo $this->Form->input('id');
		echo $this->Form->input('rubrik_id', array('label'=>'Рубрика:', 'type'=>'select', 'options'=>$all_rubrik, 'selected'=>@$this->data['id']['all_rubrik']));
		echo $this->Form->input('text');
		echo $this->Form->input('date', array('type'=> 'text'));
		echo $this->Form->input('user_id', array('label'=>'Користувач:', 'type'=>'select', 'options'=>$all_user, 'selected'=>@$this->data['id']['all_user']));
	?>
	</div>
	<div class="b_form_right">
	<?php if($this->data['DetailsAuto']):?>
		<?php echo $this->Form->hidden('DetailsAuto.0.id');?>
		<?php echo $this->Form->input('DetailsAuto.0.color', array('label'=>'Колір:'))?>
		<?php echo $this->Form->input('DetailsAuto.0.fuel_type', array('label'=>'Тип топлива:', 'options'=>array('бензин'=>'Бензин', 'дизель'=>'Дизель', 'газ'=>'Газ'), 'empty' => '-виберіть тип двигуна-'))?>
		<?php echo $this->Form->input('DetailsAuto.0.gearbox_type', array('label'=>'Коробка передач:', 'options'=>array('ручна'=>'Ручна', 'автомат'=>'Автомат'), 'empty'=>'-виберіть тип коробки передач-'))?>
		<?php echo $this->Form->input('DetailsAuto.0.drive_to', array('label'=>'Тип приводу:'))?>
	<?php endif;?>
	</div>
	
	
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions');  ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('Ad.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('Ad.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Ads', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	