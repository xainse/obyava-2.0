<div class="admins index">
	<h2><?php echo __('міста');?></h2>	
	<div class="nav">
	<a href="/admins/add" class="btn"><i class="icon-plus"></i><?php echo __('нове місто')?></a>
	</div>
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>			
			<th><?php echo $this->Paginator->sort('name_ru');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<? //we ($region);
	?>
	<?php
	$i = 0;
	foreach ($regions as $region):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		//we($region);
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $region['Region']['id'] ?>&nbsp;</td>
		<td><?php echo $region['Region']['name']; ?>&nbsp;</td>		
		<td><?php echo $region['Region']['name_ru']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view',  $region['Region']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit',  $region['Region']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',  $region['Region']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true),  $region['Region']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="pagination">
		<ul>
		<li><?php echo $this->Paginator->prev('<< ', array(), null, array('class'=>'disabled', 'tag'=>'a'));?></li>
	  	<?php echo $this->Paginator->numbers(array('tag'=>'li', 'separator' => false));?>
		<li><?php echo $this->Paginator->next(' >>', array(), null, array('class' => 'disabled', 'tag'=>'a'));?></li>
		</ul>
	</div>
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Region', true)), array('action' => 'add')); ?></li>
	</ul>
</div>