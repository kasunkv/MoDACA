<?php
App::uses('AppModel', 'Model');

class BMI extends AppModel {
        
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
		'value' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'BMI must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'BMI must be a decilmal value with 2 decimal points.',
			),
		),
	);    
        

	//The Associations below have been created with all possible keys, those that are not needed can be removed
    
	public $belongsTo = array(
		'FamilyMember' => array(
			'className' => 'FamilyMember',
			'foreignKey' => 'family_member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        
}
