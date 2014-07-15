<?php
App::uses('AppModel', 'Model');
/**
 * HealthIssueGroup Model
 *
 * @property FieldCommunity $FieldCommunity
 * @property HealthIssue $HealthIssue
 * @property HealthIssueGroupProgress $HealthIssueGroupProgress
 */
class HealthIssueGroup extends AppModel {

	public $displayField = 'group_title';


	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_of_members' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of members must not be empty.',
			),
		),
		'group_title' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Primary health issue must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Primary health issue must not exceed 255 characters.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_community_id',
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
		'HealthIssueGroupProgress' => array(
			'className' => 'HealthIssueGroupProgress',
			'foreignKey' => 'health_issue_group_id',
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
