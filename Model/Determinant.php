<?php
App::uses('AppModel', 'Model');
/**
 * Determinant Model
 *
 * @property HealthIssue $HealthIssue
 * @property Questionnaire $Questionnaire
 */
class Determinant extends AppModel {

	public $displayField = 'title';
        
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),	
                'title' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\-]+$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Identifier must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Identifier must not exceed 255 characters.',
			),
		),
		'description' => array(
			'custom' => array(
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
		'HealthIssue' => array(
			'className' => 'HealthIssue',
			'foreignKey' => 'health_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Questionnaire' => array(
			'className' => 'Questionnaire',
			'foreignKey' => 'questionnaire_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
