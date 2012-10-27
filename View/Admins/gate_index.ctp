<div class="admins index">
	<h2><?php echo __('Адміністратори сайту');?></h2>	
	<div class="nav">
	<a href="/gate/admins/add" class="btn"><i class="icon-plus"></i><?php echo __('Новий Адміністратор')?></a>
	</div>
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('login');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($admins as $admin):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $admin['Admin']['id']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['login']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['first_name']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['last_name']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['email']; ?>&nbsp;</td>
		<td><?php echo $admin['Admin']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $admin['Admin']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $admin['Admin']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $admin['Admin']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $admin['Admin']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Admin', true)), array('action' => 'add')); ?></li>
	</ul>
</div>