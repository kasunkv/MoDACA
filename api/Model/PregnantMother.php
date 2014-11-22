<?php
App::uses('AppModel', 'Model');
/**
 * PregnantMother Model
 *
 * @property Household $Household
 * @property FamilyMember $FamilyMember
 * @property PregnantMotherKnowledge $PregnantMotherKnowledge
 */
class PregnantMother extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'household_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Household' => array(
			'className' => 'Household',
			'foreignKey' => 'household_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FamilyMember' => array(
			'className' => 'FamilyMember',
			'foreignKey' => 'family_member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PregnantMotherKnowledge' => array(
			'className' => 'PregnantMotherKnowledge',
			'foreignKey' => 'pregnant_mother_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
