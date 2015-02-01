<?php
App::uses('AppModel', 'Model');
/**
 * ProgramEvalIndicatorGroup Model
 *
 * @property HealthIssue $HealthIssue
 * @property ProgramEvalIndicator $ProgramEvalIndicator
 */
class ProgramEvalIndicatorGroup extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		'ProgramEvalIndicator' => array(
			'className' => 'ProgramEvalIndicator',
			'foreignKey' => 'program_eval_indicator_group_id',
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
