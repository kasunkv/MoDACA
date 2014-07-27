<div class="administrators index">
	<h2><?php echo __('Administrators'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_no'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('designation'); ?></th>
			<th><?php echo $this->Paginator->sort('user_name'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('profile_photo'); ?></th>
			<th><?php echo $this->Paginator->sort('bio'); ?></th>
			<th><?php echo $this->Paginator->sort('timestamp'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($administrators as $administrator): ?>
	<tr>
		<td><?php echo h($administrator['Administrator']['id']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['gender']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['email']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['contact_no']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['address']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['designation']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['user_name']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['password']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['profile_photo']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['bio']); ?>&nbsp;</td>
		<td><?php echo h($administrator['Administrator']['timestamp']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $administrator['Administrator']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $administrator['Administrator']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $administrator['Administrator']['id']), array(), __('Are you sure you want to delete # %s?', $administrator['Administrator']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Administrator'), array('action' => 'add')); ?></li>
	</ul>
</div>
