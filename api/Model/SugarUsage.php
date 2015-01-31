<?php
App::uses('AppModel', 'Model');
/**
 * SugarUsage Model
 *
 * @property Household $Household
 */
class SugarUsage extends AppModel {


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
		)
	);
}
