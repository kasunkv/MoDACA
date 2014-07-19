<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('Edit Student'); ?></legend>
	<?php
		echo $this->Form->input('student_id');
		echo $this->Form->input('index_no');
		echo $this->Form->input('reg_no');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('gender');
		echo $this->Form->input('email');
		echo $this->Form->input('contact_no');
		echo $this->Form->input('address');
		echo $this->Form->input('group_name');
		echo $this->Form->input('user_name');
		echo $this->Form->input('password');
		echo $this->Form->input('profile_photo');
		echo $this->Form->input('bio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Student.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Field Groups'), array('controller' => 'field_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field Group'), array('controller' => 'field_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Progresses'), array('controller' => 'student_progresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Progress'), array('controller' => 'student_progresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Task Assigners'), array('controller' => 'task_assigners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task Assigner'), array('controller' => 'task_assigners', 'action' => 'add')); ?> </li>
	</ul>
</div>
