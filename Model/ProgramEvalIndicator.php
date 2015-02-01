<?php
App::uses('AppModel', 'Model');
/**
 * ProgramEvalIndicator Model
 *
 * @property HealthIssue $HealthIssue
 * @property Determinant $Determinant
 * @property ProgramEvalIndicatorGroup $ProgramEvalIndicatorGroup
 * @property FieldGroup $FieldGroup
 * @property ProgramEvalIndicatorScore $ProgramEvalIndicatorScore
 */
class ProgramEvalIndicator extends AppModel {


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
		),
		'Determinant' => array(
			'className' => 'Determinant',
			'foreignKey' => 'determinant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProgramEvalIndicatorGroup' => array(
			'className' => 'ProgramEvalIndicatorGroup',
			'foreignKey' => 'program_eval_indicator_group_id',
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProgramEvalIndicatorScore' => array(
			'className' => 'ProgramEvalIndicatorScore',
			'foreignKey' => 'program_eval_indicator_id',
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
