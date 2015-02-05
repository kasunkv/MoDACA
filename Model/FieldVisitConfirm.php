<?php
App::uses('AppModel', 'Model');
/**
 * FieldVisitConfirm Model
 *
 * @property FieldVisitAttendance $FieldVisitAttendance
 * @property FieldVisit $FieldVisit
 * @property FieldGroup $FieldGroup
 */
class FieldVisitConfirm extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FieldVisitAttendance' => array(
			'className' => 'FieldVisitAttendance',
			'foreignKey' => 'field_visit_attendance_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FieldVisit' => array(
			'className' => 'FieldVisit',
			'foreignKey' => 'field_visit_id',
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
