<?php
App::uses('AppModel', 'Model');
/**
 * FieldCommunity Model
 *
 * @property FieldGroup $FieldGroup
 * @property FieldGroup $FieldGroup
 * @property HealthIssueCommunity $HealthIssueCommunity
 * @property HealthIssueGroup $HealthIssueGroup
 * @property Household $Household
 */
class FieldCommunity extends AppModel {


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
				'rule' => '/^[A-Za-z0-9_\-]{4,40}$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Identifier must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Identifier must not exceed 40 characters.',
			),
		),
		'gn_area' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'GN Area must not be invalid.',
			),			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'GN Area must not exceed 255 characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'GN Area must not be empty.',
			),
		),
		'moh_area' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'MOH Area must not be invalid.',
			),			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'MOH Area must not exceed 255 characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'MOH Area must not be empty.',
			),
		),
		'phi_area' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'PHI Area must not be invalid.',
			),			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'PHI Area must not exceed 255 characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'PHI Area must not be empty.',
			),
		),
		'phm_area' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'PHM Area must not be invalid.',
			),			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'PHM Area must not exceed 255 characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'PHM Area must not be empty.',
			),
		),
		'village_name' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Village name must not be invalid.',
			),			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Village name Area must not exceed 255 characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Village name Area must not be empty.',
			),
		),
		'no_of_families' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of families must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No of families must be a number.',
			),
		),
		'population' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Population must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Population must be a number.',
			),
		),
		'field_map' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Field map Area must not exceed 255 characters.',
			),
		),		
		'no_of_formal_settings' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of formal settings must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No of formal settings must be a number.',
			),
		),
		'no_of_informal_settings' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of informal settings must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No of informal settings must be a number.',
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'FieldGroup' => array(
			'className' => 'FieldGroup',
			'foreignKey' => 'field_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasMany = array(
		'FieldGroup' => array(
			'className' => 'FieldGroup',
			'foreignKey' => 'field_community_id',
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
			'foreignKey' => 'field_community_id',
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
			'foreignKey' => 'field_community_id',
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
		'Household' => array(
			'className' => 'Household',
			'foreignKey' => 'field_community_id',
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
