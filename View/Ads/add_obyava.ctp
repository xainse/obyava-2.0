<div class="admins form">
<?php  echo $this->Form->create('Ad');?>
<legend><?php printf (__('Edit %s', true), __('Ad', true));?></legend>

	<div class="b_form_left">		
	<?php 
		/* echo $this->Form->input('DetailsAuto.color', array('label'=>'Колір автомобіля''type'=>'select', 'options'=>$last_ads, 'selected'=>@$this->data['Ad']['DetailsAuto']['color'])); */
		echo $this->Form->hidden('id');
		echo $this->Form->input('title', array('type'=>'text'));
		echo $this->Form->input('rubrik_id', array('label'=>'Рубрика:', 'type'=>'select', 'options'=>$all_rubrik, 'selected'=>@$this->data['id']['all_rubrik']));
		echo $this->Form -> radio('subrubrik_id', array('bay' => 'Продать','chenge' => 'Купить','service' => 'Обменять')); 
		echo $this->Form->input('text');
		echo $this->Form->input('tags', array('type'=> 'text'));
		//echo $this->Form->input('date', array('type'=> 'text'));
		
	?>
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
	
<style>
.error-message {font-size:12px; color:red;}
</style>