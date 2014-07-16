<div class="students view">
<h2><?php echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('Student Id'); ?></dt>
		<dd>
			<?php echo h($student['Student']['student_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Index No'); ?></dt>
		<dd>
			<?php echo h($student['Student']['index_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reg No'); ?></dt>
		<dd>
			<?php echo h($student['Student']['reg_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($student['Student']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($student['Student']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact No'); ?></dt>
		<dd>
			<?php echo h($student['Student']['contact_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($student['Student']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['group_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['user_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($student['Student']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile Photo'); ?></dt>
		<dd>
			<?php echo h($student['Student']['profile_photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($student['Student']['bio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), array(), __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Field Groups'), array('controller' => 'field_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field Group'), array('controller' => 'field_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Progresses'), array('controller' => 'student_progresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Progress'), array('controller' => 'student_progresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Task Assigners'), array('controller' => 'task_assigners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task Assigner'), array('controller' => 'task_assigners', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Student Progresses'); ?></h3>
	<?php if (!empty($student['StudentProgress'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Student Progress Id'); ?></th>
		<th><?php echo __('Student Progress Index No'); ?></th>
		<th><?php echo __('Attendance'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Mark'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['StudentProgress'] as $studentProgress): ?>
		<tr>
			<td><?php echo $studentProgress['student_progress_id']; ?></td>
			<td><?php echo $studentProgress['student_progress_index_no']; ?></td>
			<td><?php echo $studentProgress['attendance']; ?></td>
			<td><?php echo $studentProgress['date']; ?></td>
			<td><?php echo $studentProgress['start_time']; ?></td>
			<td><?php echo $studentProgress['end_time']; ?></td>
			<td><?php echo $studentProgress['mark']; ?></td>
			<td><?php echo $studentProgress['note']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'student_progresses', 'action' => 'view', $studentProgress['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'student_progresses', 'action' => 'edit', $studentProgress['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'student_progresses', 'action' => 'delete', $studentProgress['id']), array(), __('Are you sure you want to delete # %s?', $studentProgress['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student Progress'), array('controller' => 'student_progresses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Task Assigners'); ?></h3>
	<?php if (!empty($student['TaskAssigner'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Task Assigner Id'); ?></th>
		<th><?php echo __('Task Assigner Index No'); ?></th>
		<th><?php echo __('Task Assigner Reg No'); ?></th>
		<th><?php echo __('Firs Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Task Assigner Field Group Name'); ?></th>
		<th><?php echo __('User Name'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Profile Photo'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['TaskAssigner'] as $taskAssigner): ?>
		<tr>
			<td><?php echo $taskAssigner['task_assigner_id']; ?></td>
			<td><?php echo $taskAssigner['task_assigner_index_no']; ?></td>
			<td><?php echo $taskAssigner['task_assigner_reg_no']; ?></td>
			<td><?php echo $taskAssigner['firs_name']; ?></td>
			<td><?php echo $taskAssigner['last_name']; ?></td>
			<td><?php echo $taskAssigner['gender']; ?></td>
			<td><?php echo $taskAssigner['email']; ?></td>
			<td><?php echo $taskAssigner['contact_no']; ?></td>
			<td><?php echo $taskAssigner['address']; ?></td>
			<td><?php echo $taskAssigner['task_assigner_field_group_name']; ?></td>
			<td><?php echo $taskAssigner['user_name']; ?></td>
			<td><?php echo $taskAssigner['password']; ?></td>
			<td><?php echo $taskAssigner['profile_photo']; ?></td>
			<td><?php echo $taskAssigner['bio']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'task_assigners', 'action' => 'view', $taskAssigner['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'task_assigners', 'action' => 'edit', $taskAssigner['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'task_assigners', 'action' => 'delete', $taskAssigner['id']), array(), __('Are you sure you want to delete # %s?', $taskAssigner['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task Assigner'), array('controller' => 'task_assigners', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
