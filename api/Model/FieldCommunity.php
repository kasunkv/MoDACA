<?php
App::uses('AppModel', 'Model');
/**
 * FieldCommunity Model
 *
 * @property FieldGroup $FieldGroup
 * @property Determinant $Determinant
 * @property Event $Event
 * @property FieldGroup $FieldGroup
 * @property FieldMapPoint $FieldMapPoint
 * @property FieldVisit $FieldVisit
 * @property GeneralObjective $GeneralObjective
 * @property HealthIssueCommunity $HealthIssueCommunity
 * @property HealthIssueGroup $HealthIssueGroup
 * @property HealthIssue $HealthIssue
 * @property Household $Household
 * @property InitAgeDistribution $InitAgeDistribution
 * @property InitEducationLevel $InitEducationLevel
 * @property InitIncome $InitIncome
 * @property InitLocation $InitLocation
 * @property InitOccupation $InitOccupation
 * @property InitPopulation $InitPopulation
 * @property SpecificObjective $SpecificObjective
 */
class FieldCommunity extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FieldGroup' => array(
			'className' => 'FieldGroup',
			'foreignKey' => 'field_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Determinant' => array(
			'className' => 'Determinant',
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
		'Event' => array(
			'className' => 'Event',
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
		'FieldMapPoint' => array(
			'className' => 'FieldMapPoint',
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
		'FieldVisit' => array(
			'className' => 'FieldVisit',
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
		'GeneralObjective' => array(
			'className' => 'GeneralObjective',
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
		'HealthIssue' => array(
			'className' => 'HealthIssue',
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
		),
		'InitAgeDistribution' => array(
			'className' => 'InitAgeDistribution',
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
		'InitEducationLevel' => array(
			'className' => 'InitEducationLevel',
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
		'InitIncome' => array(
			'className' => 'InitIncome',
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
		'InitLocation' => array(
			'className' => 'InitLocation',
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
		'InitOccupation' => array(
			'className' => 'InitOccupation',
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
		'InitPopulation' => array(
			'className' => 'InitPopulation',
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
		'SpecificObjective' => array(
			'className' => 'SpecificObjective',
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
