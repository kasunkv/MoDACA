<?php
App::uses('AppModel', 'Model');

class StudentProgress extends AppModel {

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'attendance' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Must be true or false',
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
		'mark' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Mark must be a decilmal value with 2 decimal points.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Mark must not be empty.',
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Note must not be invalid.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Note must not be empty.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
