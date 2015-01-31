<?php
App::uses('AppModel', 'Model');
/**
 * SpecificObjective Model
 *
 * @property FieldCommunity $FieldCommunity
 * @property GeneralObjective $GeneralObjective
 */
class SpecificObjective extends AppModel {


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
		'GeneralObjective' => array(
			'className' => 'GeneralObjective',
			'foreignKey' => 'general_objective_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
