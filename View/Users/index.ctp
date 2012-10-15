<div class="admins index">
	<h2><?php echo __('Користувачі сайту');?></h2>	
	<div class="nav">
	<a href="/admins/add" class="btn"><i class="icon-plus"></i><?php echo __('новий користувач сайту')?></a>
	</div>
	
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('login');?></th>
			<th><?php echo $this->Paginator->sort('user_hash');?></th>
			<th><?php echo $this->Paginator->sort('user_ip');?></th>
			<th><?php echo $this->Paginator->sort('user_email');?></th>
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
		<td><?php echo $user['User']['_id'] ?>&nbsp;</td>
		<td><?php echo $user['User']['_login']; ?>&nbsp;</td>
		<td><?php echo $user['User']['first_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['last_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['_email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['_id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['_id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['_id'])); ?>
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