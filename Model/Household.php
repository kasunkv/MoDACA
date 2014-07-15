<?php
App::uses('AppModel', 'Model');
/**
 * Household Model
 *
 * @property FieldCommunity $FieldCommunity
 * @property Baby $Baby
 * @property ChildGrowth $ChildGrowth
 * @property FamilyMember $FamilyMember
 * @property FlourUsage $FlourUsage
 * @property NavigationDetail $NavigationDetail
 * @property OilUsage $OilUsage
 * @property PregnantMother $PregnantMother
 * @property SaltUsage $SaltUsage
 * @property SugarUsage $SugarUsage
 */
class Household extends AppModel {

	public $displayField = 'household_identifier';

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'household_identifier' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\-]+$/',
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
		'leader_name' => array(
			'custom' => array(
				'rule' => '/^[A-Z][A-Za-z. ]+$/',
				'message' => 'Name should only contain letters and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Name can not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Name must not exceed 255 characters.',
			),
		),
		'address' => array(
			'custom' => array(
				'rule' => '/^[0-9A-Za-z\-, ./()]+$/',
				'message' => 'Must be a valid address.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Address must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Address must not exceed255 characters.',
			),
		),
		'contact_no' => array(
			'custom' => array(
				'rule' => '/^0[1-9][0-9]{8}$/',
				'message' => 'Must be a valid telephone number.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 10),
				'message' => 'Contact number must not exceed 10 digits.',
			),
		),
		'gps_lattitude' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Latitude must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 5),
				'message' => 'Latitude must be a decilmal value with 5 decimal points.',
			),
		),
		'gps_longitude' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Longitude must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 5),
				'message' => 'Longitude must be a decilmal value with 5 decimal points.',
			),
		),
		'no_of_members' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of members must not be empty.',
			),
		),            
		'no_of_babies' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of babies must not be empty.',
			),
		),                
		'no_of_pregnant_mothers' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of pregnant mothers must not be empty.',
			),
		),
                'income' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Income must not be empty.',
			),
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Income must be a decilmal value with 2 decimal points.',
			),
		),
                'ranking' => array(
			'decimal' => array(
				'rule' => array('decimal', 1),
				'message' => 'Ranking must be a decilmal value with 1 decimal points.',
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Notes must not contain invalid characters.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_community_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Baby' => array(
			'className' => 'Baby',
			'foreignKey' => 'household_id',
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
		'ChildGrowth' => array(
			'className' => 'ChildGrowth',
			'foreignKey' => 'household_id',
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
			'foreignKey' => 'household_id',
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
		'FlourUsage' => array(
			'className' => 'FlourUsage',
			'foreignKey' => 'household_id',
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
		'NavigationDetail' => array(
			'className' => 'NavigationDetail',
			'foreignKey' => 'household_id',
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
		'OilUsage' => array(
			'className' => 'OilUsage',
			'foreignKey' => 'household_id',
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
		'PregnantMother' => array(
			'className' => 'PregnantMother',
			'foreignKey' => 'household_id',
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
		'SaltUsage' => array(
			'className' => 'SaltUsage',
			'foreignKey' => 'household_id',
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
		'SugarUsage' => array(
			'className' => 'SugarUsage',
			'foreignKey' => 'household_id',
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
