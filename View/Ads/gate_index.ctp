<div class="admins index">
	<h2><?php echo __('Оголошення');?></h2>	
	<div class="nav">
	<a href="/gate/ads/add" class="btn"><i class="icon-plus"></i><?php echo __('Нове Оголошення')?></a>
	</div>
	
	<table cellpadding="0" cellspacing="0" class="table table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('rubrik_id');?></th>
			<th><?php echo $this->Paginator->sort('text');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($last_ads as $one_ad):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $one_ad['Ad']['id']; ?>&nbsp;</td>
		<td><?php echo $one_ad['Ad']['rubrik_id']; ?>&nbsp;</td>
		<td><?php echo $one_ad['Ad']['text']; ?>&nbsp;</td>
		<td><?php echo $one_ad['Ad']['user_id']; ?>&nbsp;</td>
		<td><?php echo $one_ad['Ad']['date']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $one_ad['Ad']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $one_ad['Ad']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $one_ad['Ad']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $one_ad['Ad']['id'])); ?>
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
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Ad', true)), array('action' => 'add')); ?></li>
	</ul>
</div>