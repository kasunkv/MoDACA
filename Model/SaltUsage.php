<?php
App::uses('AppModel', 'Model');

class SaltUsage extends AppModel {

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Must be a valid Date.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Date must not be empty.',
			),
		),
		'value' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Value must not be empty.',
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
