<?php
App::uses('AppModel', 'Model');

class Questionnaire extends AppModel {

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_of_questions' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Number of questions must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Number of questions must be a number.',
			),
		),
		'description' => array(
			'custom' => array(
				'rule' => array('custom'),
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Description must not be invalid.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Description must not be empty.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Legend' => array(
			'className' => 'Legend',
			'foreignKey' => 'legend_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'HealthIssue' => array(
			'className' => 'HealthIssue',
			'foreignKey' => 'health_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Determinant' => array(
			'className' => 'Determinant',
			'foreignKey' => 'questionnaire_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FamilyMemberKnowledge' => array(
			'className' => 'FamilyMemberKnowledge',
			'foreignKey' => 'questionnaire_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Legend' => array(
			'className' => 'Legend',
			'foreignKey' => 'questionnaire_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PregnantMotherKnowledge' => array(
			'className' => 'PregnantMotherKnowledge',
			'foreignKey' => 'questionnaire_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'questionnaire_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
