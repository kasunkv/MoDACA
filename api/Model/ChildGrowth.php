<?php
App::uses('AppModel', 'Model');
/**
 * ChildGrowth Model
 *
 * @property Household $Household
 * @property Baby $Baby
 */
class ChildGrowth extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Household' => array(
			'className' => 'Household',
			'foreignKey' => 'household_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Baby' => array(
			'className' => 'Baby',
			'foreignKey' => 'baby_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
