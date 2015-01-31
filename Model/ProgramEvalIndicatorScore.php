<?php
App::uses('AppModel', 'Model');
/**
 * ProgramEvalIndicatorScore Model
 *
 * @property ProgramEvalIndicator $ProgramEvalIndicator
 * @property ProgramEvalCheckpoint $ProgramEvalCheckpoint
 * @property FieldGroup $FieldGroup
 * @property HealthIssue $HealthIssue
 * @property Determinant $Determinant
 */
class ProgramEvalIndicatorScore extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ProgramEvalIndicator' => array(
			'className' => 'ProgramEvalIndicator',
			'foreignKey' => 'program_eval_indicator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProgramEvalCheckpoint' => array(
			'className' => 'ProgramEvalCheckpoint',
			'foreignKey' => 'program_eval_checkpoint_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FieldGroup' => array(
			'className' => 'FieldGroup',
			'foreignKey' => 'field_group_id',
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
		),
		'Determinant' => array(
			'className' => 'Determinant',
			'foreignKey' => 'determinant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
