<?php
App::uses('AppModel', 'Model');
/**
 * NavigationDetail Model
 *
 * @property Household $Household
 */
class NavigationDetail extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'household_id';


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
