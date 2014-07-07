<?php
App::uses('AppModel', 'Model');
/**
 * Determinant Model
 *
 * @property DeterminantHealthIssue $DeterminantHealthIssue
 */
class Determinant extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'determinant_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'determinant_health_issue_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'determinant_id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'determinant_health_issue_id' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\-]{4,40}$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Identifier must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Identifier must not exceed 40 characters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Description must not be invalid.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Description must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'HealthIssue' => array(
			'className' => 'HealthIssue',
			'foreignKey' => 'determinant_health_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
