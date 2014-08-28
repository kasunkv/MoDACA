<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Administrators'), array('controller' => 'administrators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Administrator'), array('controller' => 'administrators', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Administrators'); ?></h3>
	<?php if (!empty($user['Administrator'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Designation'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Profile Photo'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Administrator'] as $administrator): ?>
		<tr>
			<td><?php echo $administrator['id']; ?></td>
			<td><?php echo $administrator['user_id']; ?></td>
			<td><?php echo $administrator['first_name']; ?></td>
			<td><?php echo $administrator['last_name']; ?></td>
			<td><?php echo $administrator['gender']; ?></td>
			<td><?php echo $administrator['email']; ?></td>
			<td><?php echo $administrator['contact_no']; ?></td>
			<td><?php echo $administrator['address']; ?></td>
			<td><?php echo $administrator['designation']; ?></td>
			<td><?php echo $administrator['username']; ?></td>
			<td><?php echo $administrator['password']; ?></td>
			<td><?php echo $administrator['profile_photo']; ?></td>
			<td><?php echo $administrator['bio']; ?></td>
			<td><?php echo $administrator['created']; ?></td>
			<td><?php echo $administrator['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'administrators', 'action' => 'view', $administrator['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'administrators', 'action' => 'edit', $administrator['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'administrators', 'action' => 'delete', $administrator['id']), array(), __('Are you sure you want to delete # %s?', $administrator['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Administrator'), array('controller' => 'administrators', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Staffs'); ?></h3>
	<?php if (!empty($user['Staff'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Designation'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Profile Photo'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Staff'] as $staff): ?>
		<tr>
			<td><?php echo $staff['id']; ?></td>
			<td><?php echo $staff['user_id']; ?></td>
			<td><?php echo $staff['first_name']; ?></td>
			<td><?php echo $staff['last_name']; ?></td>
			<td><?php echo $staff['gender']; ?></td>
			<td><?php echo $staff['email']; ?></td>
			<td><?php echo $staff['contact_no']; ?></td>
			<td><?php echo $staff['address']; ?></td>
			<td><?php echo $staff['designation']; ?></td>
			<td><?php echo $staff['username']; ?></td>
			<td><?php echo $staff['password']; ?></td>
			<td><?php echo $staff['profile_photo']; ?></td>
			<td><?php echo $staff['bio']; ?></td>
			<td><?php echo $staff['approved']; ?></td>
			<td><?php echo $staff['created']; ?></td>
			<td><?php echo $staff['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'staffs', 'action' => 'view', $staff['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'staffs', 'action' => 'edit', $staff['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'staffs', 'action' => 'delete', $staff['id']), array(), __('Are you sure you want to delete # %s?', $staff['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Students'); ?></h3>
	<?php if (!empty($user['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Field Group Id'); ?></th>
		<th><?php echo __('Index No'); ?></th>
		<th><?php echo __('Reg No'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Profile Photo'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['id']; ?></td>
			<td><?php echo $student['user_id']; ?></td>
			<td><?php echo $student['field_group_id']; ?></td>
			<td><?php echo $student['index_no']; ?></td>
			<td><?php echo $student['reg_no']; ?></td>
			<td><?php echo $student['first_name']; ?></td>
			<td><?php echo $student['last_name']; ?></td>
			<td><?php echo $student['gender']; ?></td>
			<td><?php echo $student['email']; ?></td>
			<td><?php echo $student['contact_no']; ?></td>
			<td><?php echo $student['address']; ?></td>
			<td><?php echo $student['username']; ?></td>
			<td><?php echo $student['password']; ?></td>
			<td><?php echo $student['profile_photo']; ?></td>
			<td><?php echo $student['bio']; ?></td>
			<td><?php echo $student['approved']; ?></td>
			<td><?php echo $student['created']; ?></td>
			<td><?php echo $student['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students', 'action' => 'delete', $student['id']), array(), __('Are you sure you want to delete # %s?', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
