<div class="households view">
<h2><?php echo __('Household'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($household['Household']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field Community'); ?></dt>
		<dd>
			<?php echo $this->Html->link($household['FieldCommunity']['title'], array('controller' => 'field_communities', 'action' => 'view', $household['FieldCommunity']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Household Identifier'); ?></dt>
		<dd>
			<?php echo h($household['Household']['household_identifier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leader Name'); ?></dt>
		<dd>
			<?php echo h($household['Household']['leader_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($household['Household']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact No'); ?></dt>
		<dd>
			<?php echo h($household['Household']['contact_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gps Latitude'); ?></dt>
		<dd>
			<?php echo h($household['Household']['gps_latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gps Longitude'); ?></dt>
		<dd>
			<?php echo h($household['Household']['gps_longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo h($household['Household']['race']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Members'); ?></dt>
		<dd>
			<?php echo h($household['Household']['no_of_members']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Babies'); ?></dt>
		<dd>
			<?php echo h($household['Household']['no_of_babies']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Pregnant Mothers'); ?></dt>
		<dd>
			<?php echo h($household['Household']['no_of_pregnant_mothers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Income'); ?></dt>
		<dd>
			<?php echo h($household['Household']['income']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ranking'); ?></dt>
		<dd>
			<?php echo h($household['Household']['ranking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($household['Household']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($household['Household']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($household['Household']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Household'), array('action' => 'edit', $household['Household']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Household'), array('action' => 'delete', $household['Household']['id']), array(), __('Are you sure you want to delete # %s?', $household['Household']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Households'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Household'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Babies'); ?></h3>
	<?php if (!empty($household['Baby'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Baby Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('No Of Sibiling'); ?></th>
		<th><?php echo __('Profile Photo'); ?></th>
		<th><?php echo __('Health Issue Id'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['Baby'] as $baby): ?>
		<tr>
			<td><?php echo $baby['id']; ?></td>
			<td><?php echo $baby['household_id']; ?></td>
			<td><?php echo $baby['baby_name']; ?></td>
			<td><?php echo $baby['age']; ?></td>
			<td><?php echo $baby['gender']; ?></td>
			<td><?php echo $baby['no_of_sibiling']; ?></td>
			<td><?php echo $baby['profile_photo']; ?></td>
			<td><?php echo $baby['health_issue_id']; ?></td>
			<td><?php echo $baby['weight']; ?></td>
			<td><?php echo $baby['height']; ?></td>
			<td><?php echo $baby['note']; ?></td>
			<td><?php echo $baby['created']; ?></td>
			<td><?php echo $baby['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'babies', 'action' => 'view', $baby['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'babies', 'action' => 'edit', $baby['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'babies', 'action' => 'delete', $baby['id']), array(), __('Are you sure you want to delete # %s?', $baby['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Baby'), array('controller' => 'babies', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Child Growths'); ?></h3>
	<?php if (!empty($household['ChildGrowth'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Baby Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Age Year'); ?></th>
		<th><?php echo __('Age Month'); ?></th>
		<th><?php echo __('Vision'); ?></th>
		<th><?php echo __('Hearing'); ?></th>
		<th><?php echo __('Sensitivity'); ?></th>
		<th><?php echo __('Smell'); ?></th>
		<th><?php echo __('Taste'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['ChildGrowth'] as $childGrowth): ?>
		<tr>
			<td><?php echo $childGrowth['id']; ?></td>
			<td><?php echo $childGrowth['household_id']; ?></td>
			<td><?php echo $childGrowth['baby_id']; ?></td>
			<td><?php echo $childGrowth['date']; ?></td>
			<td><?php echo $childGrowth['weight']; ?></td>
			<td><?php echo $childGrowth['height']; ?></td>
			<td><?php echo $childGrowth['age_year']; ?></td>
			<td><?php echo $childGrowth['age_month']; ?></td>
			<td><?php echo $childGrowth['vision']; ?></td>
			<td><?php echo $childGrowth['hearing']; ?></td>
			<td><?php echo $childGrowth['sensitivity']; ?></td>
			<td><?php echo $childGrowth['smell']; ?></td>
			<td><?php echo $childGrowth['taste']; ?></td>
			<td><?php echo $childGrowth['created']; ?></td>
			<td><?php echo $childGrowth['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'child_growths', 'action' => 'view', $childGrowth['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'child_growths', 'action' => 'edit', $childGrowth['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'child_growths', 'action' => 'delete', $childGrowth['id']), array(), __('Are you sure you want to delete # %s?', $childGrowth['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Growth'), array('controller' => 'child_growths', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Family Members'); ?></h3>
	<?php if (!empty($household['FamilyMember'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Occupation'); ?></th>
		<th><?php echo __('Profile Photo'); ?></th>
		<th><?php echo __('Decease'); ?></th>
		<th><?php echo __('Health Issue Id'); ?></th>
		<th><?php echo __('Sleeping Hour'); ?></th>
		<th><?php echo __('Exercise Hour'); ?></th>
		<th><?php echo __('Educational Level'); ?></th>
		<th><?php echo __('Bmi'); ?></th>
		<th><?php echo __('Whr'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['FamilyMember'] as $familyMember): ?>
		<tr>
			<td><?php echo $familyMember['id']; ?></td>
			<td><?php echo $familyMember['household_id']; ?></td>
			<td><?php echo $familyMember['first_name']; ?></td>
			<td><?php echo $familyMember['last_name']; ?></td>
			<td><?php echo $familyMember['age']; ?></td>
			<td><?php echo $familyMember['gender']; ?></td>
			<td><?php echo $familyMember['occupation']; ?></td>
			<td><?php echo $familyMember['profile_photo']; ?></td>
			<td><?php echo $familyMember['decease']; ?></td>
			<td><?php echo $familyMember['health_issue_id']; ?></td>
			<td><?php echo $familyMember['sleeping_hour']; ?></td>
			<td><?php echo $familyMember['exercise_hour']; ?></td>
			<td><?php echo $familyMember['educational_level']; ?></td>
			<td><?php echo $familyMember['bmi']; ?></td>
			<td><?php echo $familyMember['whr']; ?></td>
			<td><?php echo $familyMember['note']; ?></td>
			<td><?php echo $familyMember['created']; ?></td>
			<td><?php echo $familyMember['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'family_members', 'action' => 'view', $familyMember['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'family_members', 'action' => 'edit', $familyMember['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'family_members', 'action' => 'delete', $familyMember['id']), array(), __('Are you sure you want to delete # %s?', $familyMember['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Family Member'), array('controller' => 'family_members', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Flour Usages'); ?></h3>
	<?php if (!empty($household['FlourUsage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['FlourUsage'] as $flourUsage): ?>
		<tr>
			<td><?php echo $flourUsage['id']; ?></td>
			<td><?php echo $flourUsage['household_id']; ?></td>
			<td><?php echo $flourUsage['date']; ?></td>
			<td><?php echo $flourUsage['value']; ?></td>
			<td><?php echo $flourUsage['created']; ?></td>
			<td><?php echo $flourUsage['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'flour_usages', 'action' => 'view', $flourUsage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'flour_usages', 'action' => 'edit', $flourUsage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'flour_usages', 'action' => 'delete', $flourUsage['id']), array(), __('Are you sure you want to delete # %s?', $flourUsage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Flour Usage'), array('controller' => 'flour_usages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Navigation Details'); ?></h3>
	<?php if (!empty($household['NavigationDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['NavigationDetail'] as $navigationDetail): ?>
		<tr>
			<td><?php echo $navigationDetail['id']; ?></td>
			<td><?php echo $navigationDetail['household_id']; ?></td>
			<td><?php echo $navigationDetail['latitude']; ?></td>
			<td><?php echo $navigationDetail['longitude']; ?></td>
			<td><?php echo $navigationDetail['created']; ?></td>
			<td><?php echo $navigationDetail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'navigation_details', 'action' => 'view', $navigationDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'navigation_details', 'action' => 'edit', $navigationDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'navigation_details', 'action' => 'delete', $navigationDetail['id']), array(), __('Are you sure you want to delete # %s?', $navigationDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Navigation Detail'), array('controller' => 'navigation_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Oil Usages'); ?></h3>
	<?php if (!empty($household['OilUsage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['OilUsage'] as $oilUsage): ?>
		<tr>
			<td><?php echo $oilUsage['id']; ?></td>
			<td><?php echo $oilUsage['household_id']; ?></td>
			<td><?php echo $oilUsage['date']; ?></td>
			<td><?php echo $oilUsage['value']; ?></td>
			<td><?php echo $oilUsage['created']; ?></td>
			<td><?php echo $oilUsage['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'oil_usages', 'action' => 'view', $oilUsage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'oil_usages', 'action' => 'edit', $oilUsage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'oil_usages', 'action' => 'delete', $oilUsage['id']), array(), __('Are you sure you want to delete # %s?', $oilUsage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Oil Usage'), array('controller' => 'oil_usages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pregnant Mothers'); ?></h3>
	<?php if (!empty($household['PregnantMother'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Family Member Id'); ?></th>
		<th><?php echo __('Note'); ?></th>
		<th><?php echo __('Fetus Age'); ?></th>
		<th><?php echo __('No Of Children'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['PregnantMother'] as $pregnantMother): ?>
		<tr>
			<td><?php echo $pregnantMother['id']; ?></td>
			<td><?php echo $pregnantMother['household_id']; ?></td>
			<td><?php echo $pregnantMother['family_member_id']; ?></td>
			<td><?php echo $pregnantMother['note']; ?></td>
			<td><?php echo $pregnantMother['fetus_age']; ?></td>
			<td><?php echo $pregnantMother['no_of_children']; ?></td>
			<td><?php echo $pregnantMother['weight']; ?></td>
			<td><?php echo $pregnantMother['created']; ?></td>
			<td><?php echo $pregnantMother['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pregnant_mothers', 'action' => 'view', $pregnantMother['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pregnant_mothers', 'action' => 'edit', $pregnantMother['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pregnant_mothers', 'action' => 'delete', $pregnantMother['id']), array(), __('Are you sure you want to delete # %s?', $pregnantMother['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pregnant Mother'), array('controller' => 'pregnant_mothers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Salt Usages'); ?></h3>
	<?php if (!empty($household['SaltUsage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['SaltUsage'] as $saltUsage): ?>
		<tr>
			<td><?php echo $saltUsage['id']; ?></td>
			<td><?php echo $saltUsage['household_id']; ?></td>
			<td><?php echo $saltUsage['date']; ?></td>
			<td><?php echo $saltUsage['value']; ?></td>
			<td><?php echo $saltUsage['created']; ?></td>
			<td><?php echo $saltUsage['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'salt_usages', 'action' => 'view', $saltUsage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'salt_usages', 'action' => 'edit', $saltUsage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'salt_usages', 'action' => 'delete', $saltUsage['id']), array(), __('Are you sure you want to delete # %s?', $saltUsage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Salt Usage'), array('controller' => 'salt_usages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sugar Usages'); ?></h3>
	<?php if (!empty($household['SugarUsage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Household Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($household['SugarUsage'] as $sugarUsage): ?>
		<tr>
			<td><?php echo $sugarUsage['id']; ?></td>
			<td><?php echo $sugarUsage['household_id']; ?></td>
			<td><?php echo $sugarUsage['date']; ?></td>
			<td><?php echo $sugarUsage['value']; ?></td>
			<td><?php echo $sugarUsage['created']; ?></td>
			<td><?php echo $sugarUsage['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sugar_usages', 'action' => 'view', $sugarUsage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sugar_usages', 'action' => 'edit', $sugarUsage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sugar_usages', 'action' => 'delete', $sugarUsage['id']), array(), __('Are you sure you want to delete # %s?', $sugarUsage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sugar Usage'), array('controller' => 'sugar_usages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
