<div class="admins index">
	<h2><?php echo __('рубрики');?></h2>	
	<div class="nav">
	<a href="/gate/rubriks/add" class="btn"><i class="icon-plus"></i><?php echo __('нова рубрика')?></a>
	</div>
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>			
			<th><?php echo $this->Paginator->sort('comment');?></th>
			<th><?php echo $this->Paginator->sort('template');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rubriks as $rubrik):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		//we($rubrik);
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $rubrik['Rubrik']['id'] ?>&nbsp;</td>
		<td><?php echo $rubrik['Rubrik']['name']; ?>&nbsp;</td>		
		<td><?php echo $rubrik['Rubrik']['comment']; ?>&nbsp;</td>		
		<td><?php echo $rubrik['Rubrik']['template']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view',  $rubrik['Rubrik']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit',  $rubrik['Rubrik']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete',  $rubrik['Rubrik']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true),  $rubrik['Rubrik']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Rubrik', true)), array('action' => 'add')); ?></li>
	</ul>
</div>