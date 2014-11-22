<?php
App::uses('AppModel', 'Model');
/**
 * FamilyMember Model
 *
 * @property Household $Household
 * @property HealthIssue $HealthIssue
 * @property BMI $BMI
 * @property FamilyMemberKnowledge $FamilyMemberKnowledge
 * @property PregnantMother $PregnantMother
 * @property WHR $WHR
 */
class FamilyMember extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'first_name';


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
		'HealthIssue' => array(
			'className' => 'HealthIssue',
			'foreignKey' => 'health_issue_id',
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
		'BMI' => array(
			'className' => 'BMI',
			'foreignKey' => 'family_member_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FamilyMemberKnowledge' => array(
			'className' => 'FamilyMemberKnowledge',
			'foreignKey' => 'family_member_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PregnantMother' => array(
			'className' => 'PregnantMother',
			'foreignKey' => 'family_member_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'WHR' => array(
			'className' => 'WHR',
			'foreignKey' => 'family_member_id',
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
