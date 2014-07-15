<?php
App::uses('AppModel', 'Model');
/**
 * Indicator Model
 *
 * @property HealthIssue $HealthIssue
 * @property HealthIssueGroupProgress $HealthIssueGroupProgress
 */
class Indicator extends AppModel {


	public $displayField = 'title';

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'title' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\-]+$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Identifier must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Identifier must not exceed 40 characters.',
			),
		),
		'indicator_type' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z\-, ./()]+$/',
				'message' => 'Indicator type must not have invalid charactors.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Indicator type must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Indicator type must not exceed 40 characters.',
			),
		),
		'description' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Description must not be invalid.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed


	public $belongsTo = array(
		'HealthIssue' => array(
			'className' => 'HealthIssue',
			'foreignKey' => 'health_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'HealthIssueGroupProgress' => array(
			'className' => 'HealthIssueGroupProgress',
			'foreignKey' => 'indicator_id',
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
