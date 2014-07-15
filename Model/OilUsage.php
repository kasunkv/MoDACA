<?php
App::uses('AppModel', 'Model');
/**
 * OilUsage Model
 *
 * @property Household $Household
 */
class OilUsage extends AppModel {


	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		), 
		'date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Date must not be empty.',
			),
			'date' => array(
				'rule' => array('date'),
				'message' => 'Must be a valid date.',
			),
		),
		'value' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Value must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Value must be a decilmal value with 2 decimal points.',
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
