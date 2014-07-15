<?php
App::uses('AppModel', 'Model');
/**
 * Baby Model
 *
 * @property ChildGrowth $ChildGrowth
 * @property Household $Household
 * @property HealthIssue $HealthIssue
 */
class Baby extends AppModel {

	public $displayField = 'baby_name';
        
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'baby_name' => array(
			'custom' => array(
				'rule' => '/^[A-Z][A-Za-z. ]+$/',
				'message' => 'Baby name should only contain letters and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Baby name should not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Baby name must not exceed 255 characters.',
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
		'no_of_sibling' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Number of sibilings must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Number of sibilings must be a number.',
			),
		),
		'profile_photo' => array(			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'URL must not exceed 255 characters.',
			),
		),		
		'weight' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Weight must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Weight must be a decilmal value with 2 decimal points.',
			),
		),
		'height' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Height must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Height must be a decilmal value with 2 decimal points.',
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Note must not be invalid.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Note must not be empty.',
			),		
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasOne = array(
		'ChildGrowth' => array(
			'className' => 'ChildGrowth',
			'foreignKey' => 'baby_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

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
}
