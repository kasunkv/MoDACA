<div class="administrators form">
<?php echo $this->Form->create('Administrator'); ?>
	<fieldset>
		<legend><?php echo __('Edit Administrator'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('gender');
		echo $this->Form->input('email');
		echo $this->Form->input('contact_no');
		echo $this->Form->input('address');
		echo $this->Form->input('designation');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('profile_photo');
		echo $this->Form->input('bio');
		echo $this->Form->input('timestamp');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Administrator.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Administrator.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Administrators'), array('action' => 'index')); ?></li>
	</ul>
</div>
