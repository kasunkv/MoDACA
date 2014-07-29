<div class="staffs form">
<?php echo $this->Form->create('Staff'); ?>
	<fieldset>
		<legend><?php echo __('Add Staff'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('gender');
		echo $this->Form->input('email');
		echo $this->Form->input('contact_no');
		echo $this->Form->input('address');
		echo $this->Form->input('designation');
		echo $this->Form->input('user_name');
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

		<li><?php echo $this->Html->link(__('List Staffs'), array('action' => 'index')); ?></li>
	</ul>
</div>
