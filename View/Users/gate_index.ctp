<div class="admins index">
	<h2><?php echo __('Користувачі сайту');?></h2>	
	<div class="nav">
	<a href="/gate/users/add" class="btn"><i class="icon-plus"></i><?php echo __('новий користувач сайту')?></a>
	</div>
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('login');?></th>			
			<th><?php echo $this->Paginator->sort('ip');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('autorize');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id'] ?>&nbsp;</td>
		<td><?php echo $user['User']['login']; ?>&nbsp;</td>		
		<td><?php echo $user['User']['ip']; ?>&nbsp;</td>		
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['autorize']; ?>&nbsp;</td>
		<td><?php echo $user['User']['status']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)), array('action' => 'add')); ?></li>
	</ul>
</div>