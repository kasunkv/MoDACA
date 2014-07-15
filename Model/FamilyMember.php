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

	public $displayField = 'first_name';
        
        public $validate = array(
		'family_member_id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),		
		'first_name' => array(
			'custom' => array(
				'rule' => '/^[A-Z][A-Za-z. ]+$/',
				'message' => 'First name should only contain letters and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'First name can not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'First name must not exceed 255 characters.',
			),
		),
		'last_name' => array(
			'custom' => array(
				'rule' => '/^[A-Z][A-Za-z. ]+$/',
				'message' => 'Last name should only contain letters and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Last name should not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Last name must not exceed 255 characters.',
			),
		),
		'age' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Age must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Age must be a number.',
			),
		),
		'gender' => array(
			'custom' => array(
				'rule' => '/^(Male|Female)$/',
				'message' => 'Gender should be Male or Female',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Gender must not be empty',
			),
		),
		'occupation' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z\-, ./()]+$/',
				'message' => 'Must not contain numbers and special characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Occupation must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Occupation must not exceed 255 characters.',
			),
		),
		'profile_photo' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'URL must not exceed 255 characters.',
			),
		),
		'decease' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Must not include invalid characters.',
			),
		),		
		'sleeping_hour' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Sleeping hours must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Sleeping hours must be a number.',
			),
		),
		'exercise_hour' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Exercise hours must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Exercise hours must be a number.',
			),
		),
		'educational_level' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Educational level must not be invalid.',
			),			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Educational level must not exceed 255 characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Educational level must not be empty.',
			),			
		),
		'bmi' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'BMI must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'BMI must be a decilmal value with 2 decimal points.',
			),
		),
		'whr' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'WHR must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'WHR must be a decilmal value with 2 decimal points.',
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Notes must not be invalid.',
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
