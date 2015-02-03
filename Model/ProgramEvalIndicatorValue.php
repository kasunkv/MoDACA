<?php
App::uses('AppModel', 'Model');
/**
 * ProgramEvalIndicatorValue Model
 *
 * @property ProgramEvalCheckpoint $ProgramEvalCheckpoint
 * @property ProgramEvalIndicator $ProgramEvalIndicator
 * @property HealthIssue $HealthIssue
 */
class ProgramEvalIndicatorValue extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ProgramEvalCheckpoint' => array(
			'className' => 'ProgramEvalCheckpoint',
			'foreignKey' => 'program_eval_checkpoint_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProgramEvalIndicator' => array(
			'className' => 'ProgramEvalIndicator',
			'foreignKey' => 'program_eval_indicator_id',
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
