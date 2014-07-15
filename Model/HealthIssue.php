<?php
App::uses('AppModel', 'Model');
/**
 * HealthIssue Model
 *
 * @property Baby $Baby
 * @property Determinant $Determinant
 * @property FamilyMember $FamilyMember
 * @property HealthIssueCommunity $HealthIssueCommunity
 * @property HealthIssueGroup $HealthIssueGroup
 * @property Indicator $Indicator
 * @property Questionnaire $Questionnaire
 */
class HealthIssue extends AppModel {

	public $displayField = 'issue_name';


	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),'issue_name' => array(
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
				'message' => 'Description must not contain invalid characters.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasMany = array(
		'Baby' => array(
			'className' => 'Baby',
			'foreignKey' => 'health_issue_id',
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
		'Determinant' => array(
			'className' => 'Determinant',
			'foreignKey' => 'health_issue_id',
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
		'FamilyMember' => array(
			'className' => 'FamilyMember',
			'foreignKey' => 'health_issue_id',
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
		'HealthIssueCommunity' => array(
			'className' => 'HealthIssueCommunity',
			'foreignKey' => 'health_issue_id',
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
		'HealthIssueGroup' => array(
			'className' => 'HealthIssueGroup',
			'foreignKey' => 'health_issue_id',
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
		'Indicator' => array(
			'className' => 'Indicator',
			'foreignKey' => 'health_issue_id',
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
		'Questionnaire' => array(
			'className' => 'Questionnaire',
			'foreignKey' => 'health_issue_id',
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
