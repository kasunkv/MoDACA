<?php
App::uses('AppModel', 'Model');
/**
 * OutputIndicator Model
 *
 * @property FieldGroup $FieldGroup
 * @property GeneralObjective $GeneralObjective
 */
class OutputIndicator extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FieldGroup' => array(
			'className' => 'FieldGroup',
			'foreignKey' => 'field_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeneralObjective' => array(
			'className' => 'GeneralObjective',
			'foreignKey' => 'general_objective_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
