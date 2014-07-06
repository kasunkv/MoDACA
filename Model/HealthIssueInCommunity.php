<?php
App::uses('AppModel', 'Model');
/**
 * HealthIssueInCommunity Model
 *
 */
class HealthIssueInCommunity extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'health_issue_in_communitys';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'health_issue_in_community_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'health_issue_in_community_id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'health_issue_in_community_field_community_identifier' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'custom' => array(
				'rule' => array('custom'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'health_issue_in_community_health_issue_identifier' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'custom' => array(
				'rule' => array('custom'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
