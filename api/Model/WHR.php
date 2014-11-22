<?php
App::uses('AppModel', 'Model');
/**
 * WHR Model
 *
 * @property FamilyMember $FamilyMember
 */
class WHR extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FamilyMember' => array(
			'className' => 'FamilyMember',
			'foreignKey' => 'family_member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
