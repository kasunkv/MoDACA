<?php
App::uses('AppModel', 'Model');
/**
 * FieldVisit Model
 *
 * @property FieldCommunity $FieldCommunity
 * @property FieldGroup $FieldGroup
 * @property FieldVisitAttendance $FieldVisitAttendance
 * @property FieldVisitConfirm $FieldVisitConfirm
 */
class FieldVisit extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_community_id',
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
		'FieldVisitAttendance' => array(
			'className' => 'FieldVisitAttendance',
			'foreignKey' => 'field_visit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FieldVisitConfirm' => array(
			'className' => 'FieldVisitConfirm',
			'foreignKey' => 'field_visit_id',
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
