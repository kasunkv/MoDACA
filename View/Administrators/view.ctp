<div class="administrators view">
<h2><?php echo __('Administrator'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact No'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['contact_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile Photo'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['profile_photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['bio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestamp'); ?></dt>
		<dd>
			<?php echo h($administrator['Administrator']['timestamp']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Administrator'), array('action' => 'edit', $administrator['Administrator']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Administrator'), array('action' => 'delete', $administrator['Administrator']['id']), array(), __('Are you sure you want to delete # %s?', $administrator['Administrator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Administrators'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Administrator'), array('action' => 'add')); ?> </li>
	</ul>
</div>
