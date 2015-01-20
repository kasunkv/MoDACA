<div class="administrators form">
<?php $this->layout = 'defaultLayout'; ?>
<?php
    $this->start('sideNav');
    echo $this->element('adminNav');
    $this->end();
?>
<?php
    $this->start('logout');
    echo $this->element('logoutBtn');
    $this->end();
?>
<?php echo $this->Form->create('Administrator'); ?>
	<fieldset>
		<legend><?php echo __('Add Administrator'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Administrators'), array('action' => 'index')); ?></li>
	</ul>
</div>
