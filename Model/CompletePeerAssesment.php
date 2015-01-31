<?php
App::uses('AppModel', 'Model');
/**
 * CompletePeerAssesment Model
 *
 * @property Student $Student
 * @property FieldGroup $FieldGroup
 * @property AssesmentCheckpoint $AssesmentCheckpoint
 * @property AssesmentCriteria $AssesmentCriteria
 */
class CompletePeerAssesment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		),
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
		)
	);
}
