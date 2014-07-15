<?php
App::uses('AppModel', 'Model');
/**
 * ChildGrowth Model
 *
 * @property Household $Household
 * @property Baby $Baby
 */
class ChildGrowth extends AppModel {
        
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
				'message' => 'Must be a valid date.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Date must not be empty.',
			),
		),
		'weight' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Weight must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Weight must be a decilmal value with 2 decimal points.',
			),
		),
		'height' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Height must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Height must be a decilmal value with 2 decimal points.',
			),
		),
		'age_year' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Age must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Age must be a number.',
			),
		),
                'age_month' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Age must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Age must be a number.',
			),
		),
		'vision' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Must be true or false',
			),			
		),
		'hearing' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Must be true or false',
			),
		),
		'sensitivity' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Must be true or false',
			),
		),
		'smell' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Must be true or false',
			),
		),
		'taste' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Must be true or false',
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
