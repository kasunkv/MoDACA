<?php
App::uses('AppModel', 'Model');
/**
 * NavigationDetail Model
 *
 * @property Household $Household
 */
class NavigationDetail extends AppModel {

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'latitude' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Latitude must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 5),
				'message' => 'Latitude must be a decilmal value with 5 decimal points.',
			),
		),
		'longitude' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Longitude must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 5),
				'message' => 'Longitude must be a decilmal value with 5 decimal points.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
