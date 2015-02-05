<?php
App::uses('AppModel', 'Model');
/**
 * FieldVisitAttendance Model
 *
 * @property FieldVisit $FieldVisit
 * @property Student $Student
 * @property FieldGroup $FieldGroup
 * @property FieldVisitConfirm $FieldVisitConfirm
 */
class FieldVisitAttendance extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FieldVisit' => array(
			'className' => 'FieldVisit',
			'foreignKey' => 'field_visit_id',
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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'FieldVisitConfirm' => array(
			'className' => 'FieldVisitConfirm',
			'foreignKey' => 'field_visit_attendance_id',
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
