<div class="households form">
<?php echo $this->Form->create('Household'); ?>
	<fieldset>
		<legend><?php echo __('Edit Household'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('field_community_id');
		echo $this->Form->input('household_identifier');
		echo $this->Form->input('leader_name');
		echo $this->Form->input('address');
		echo $this->Form->input('contact_no');
		echo $this->Form->input('gps_latitude');
		echo $this->Form->input('gps_longitude');
		echo $this->Form->input('race');
		echo $this->Form->input('no_of_members');
		echo $this->Form->input('no_of_babies');
		echo $this->Form->input('no_of_pregnant_mothers');
		echo $this->Form->input('income');
		echo $this->Form->input('ranking');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Household.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Household.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Households'), array('action' => 'index')); ?></li>
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
