<?php
App::uses('AppModel', 'Model');

class Question extends AppModel {

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'question_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Question number must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Question number must be a number.',
			),
		),
		'question' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Note must not be invalid.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Question must not be empty.',
			),
		),
		'no_of_responses' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Number of responses must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Number of responses must be a number.',
			),
		),
		'weight_of_response1' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight of response must be a number.',
			),
		),
		'weight_of_response2' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight of response must be a number.',
			),
		),
		'weight_of_response3' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight of response must be a number.',
			),
		),
		'weight_of_response4' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight of response must be a number.',
			),
		),
		'weight_of_response5' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight of response must be a number.',
			),
		),
		'weight_of_response6' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight of response must be a number.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Questionnaire' => array(
			'className' => 'Questionnaire',
			'foreignKey' => 'questionnaire_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
