<?php
App::uses('AppModel', 'Model');
/**
 * HealthIssueGroupProgress Model
 *
 * @property HealthIssueGroup $HealthIssueGroup
 * @property Indicator $Indicator
 */
class HealthIssueGroupProgress extends AppModel {


	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Description must not be invalid.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Description must not be empty.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed


	public $belongsTo = array(
		'HealthIssueGroup' => array(
			'className' => 'HealthIssueGroup',
			'foreignKey' => 'health_issue_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Indicator' => array(
			'className' => 'Indicator',
			'foreignKey' => 'indicator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
