<div class="households index">
	<h2><?php echo __('Households'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('field_community_id'); ?></th>
			<th><?php echo $this->Paginator->sort('household_identifier'); ?></th>
			<th><?php echo $this->Paginator->sort('leader_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('contact_no'); ?></th>
			<th><?php echo $this->Paginator->sort('gps_latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('gps_longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('race'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_members'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_babies'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_pregnant_mothers'); ?></th>
			<th><?php echo $this->Paginator->sort('income'); ?></th>
			<th><?php echo $this->Paginator->sort('ranking'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($households as $household): ?>
	<tr>
		<td><?php echo h($household['Household']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($household['FieldCommunity']['title'], array('controller' => 'field_communities', 'action' => 'view', $household['FieldCommunity']['id'])); ?>
		</td>
		<td><?php echo h($household['Household']['household_identifier']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['leader_name']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['address']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['contact_no']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['gps_latitude']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['gps_longitude']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['race']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['no_of_members']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['no_of_babies']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['no_of_pregnant_mothers']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['income']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['ranking']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['note']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['created']); ?>&nbsp;</td>
		<td><?php echo h($household['Household']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $household['Household']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $household['Household']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $household['Household']['id']), array(), __('Are you sure you want to delete # %s?', $household['Household']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Household'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Field Communities'), array('controller' => 'field_communities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field Community'), array('controller' => 'field_communities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Babies'), array('controller' => 'babies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Baby'), array('controller' => 'babies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Child Growths'), array('controller' => 'child_growths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child Growth'), array('controller' => 'child_growths', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Family Members'), array('controller' => 'family_members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family Member'), array('controller' => 'family_members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flour Usages'), array('controller' => 'flour_usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Flour Usage'), array('controller' => 'flour_usages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Navigation Details'), array('controller' => 'navigation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Navigation Detail'), array('controller' => 'navigation_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oil Usages'), array('controller' => 'oil_usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oil Usage'), array('controller' => 'oil_usages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pregnant Mothers'), array('controller' => 'pregnant_mothers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pregnant Mother'), array('controller' => 'pregnant_mothers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salt Usages'), array('controller' => 'salt_usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salt Usage'), array('controller' => 'salt_usages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sugar Usages'), array('controller' => 'sugar_usages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sugar Usage'), array('controller' => 'sugar_usages', 'action' => 'add')); ?> </li>
	</ul>
</div>
