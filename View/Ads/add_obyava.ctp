<div class="admins form" style="
			background : url('/img/bg.jpg') 

">
<?php  echo $this->Form->create('Ad');?>
<legend><?php printf (__('Edit %s', true), __('Ad', true));?></legend>
	<div style="
				margin-left: 10% ;
				border-style: solid;
				border-color: #000000;
				border-width: 1px 1px 0px 1px;
				-webkit-border-top-left-radius: 15px;
				-webkit-border-top-right-radius: 15px;
				-moz-border-radius-topleft: 15px;
				-moz-border-radius-topright: 15px;
				border-top-left-radius: 15px;
				border-top-right-radius: 15px;
				float: center;
				
				text-decoration: none;
				/*height: 25px;  Высота блока */
				width: 150px; /* Ширина блока */
				background: #fff; /* Цвет фона 
				z-index: 1;"> 
			<p> Додати об'яву</p>
	</div>
	<div style="
			border-style: solid;
			border-width: 1px;
			border-color: #000000;
			background: #fff; /* Цвет фона */
			width: 80%; /* Ширина блока */
			margin-left: 10% ;
			margin-top: -25px ;
			z-index: 2;
			
	">
	<div class="form_right">	
	
	<?php 
		
		echo $this->Form->hidden('id');
		echo $this->Form->input('title', array('label'=>'Назва:', 'type'=>'text'));
		echo $this->Form->input('rubrik_id', array('label'=>'Рубрика:', 'type'=>'select', 'options'=>$all_rubrik, 'selected'=>@$this->data['id']['all_rubrik']));
		
		echo $this->Form ->input('subrubrik_id', array('label'=>'Підрубрика:', 'type'=>'radio', 'options'=>array('bay' => 'Продать','chenge' => 'Купить','service' => 'Обменять'))); 
		echo $this->Form->input('text');
		echo $this->Form->input('tags', array('label'=>'Теги:','type'=> 'text'));
		echo $this->Form->input('date', array('label'=>'Дата:','type'=> 'text'));
		
	?>
	</div>	
<?php echo $this->Form->end(__('отправить', true));?>
</div>
<div>
<div class="actions">
	<h3><?php __('Actions');  ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action'=> 'delete', $this->Form->value('Ad.id')), null, sprintf(__('Are you sure you want to delete # %s?', true),$this->Form->value('Ad.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Ads', true)), array('action'=> 'index'));?></li>
	</ul>
</div>
	