<?php
App::uses('AppModel', 'Model');
/**
 * PeerAssesment Model
 *
 * @property AssesmentCheckpoint $AssesmentCheckpoint
 * @property AssesmentCriteria $AssesmentCriteria
 * @property Student $Student
 * @property FieldGroup $FieldGroup
 */
class PeerAssesment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'score' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
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
		'AssesmentCheckpoint' => array(
			'className' => 'AssesmentCheckpoint',
			'foreignKey' => 'assesment_checkpoint_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AssesmentCriteria' => array(
			'className' => 'AssesmentCriteria',
			'foreignKey' => 'assesment_criteria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
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
}
