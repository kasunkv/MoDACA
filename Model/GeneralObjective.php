<?php
App::uses('AppModel', 'Model');
/**
 * GeneralObjective Model
 *
 * @property HealthIssue $HealthIssue
 * @property FieldCommunity $FieldCommunity
 * @property FieldGroup $FieldGroup
 * @property InputIndicator $InputIndicator
 * @property OutcomeIndicator $OutcomeIndicator
 * @property OutputIndicator $OutputIndicator
 * @property ProcessIndicator $ProcessIndicator
 * @property SpecificObjective $SpecificObjective
 */
class GeneralObjective extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'HealthIssue' => array(
			'className' => 'HealthIssue',
			'foreignKey' => 'health_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_community_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'InputIndicator' => array(
			'className' => 'InputIndicator',
			'foreignKey' => 'general_objective_id',
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
		'OutcomeIndicator' => array(
			'className' => 'OutcomeIndicator',
			'foreignKey' => 'general_objective_id',
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
		'OutputIndicator' => array(
			'className' => 'OutputIndicator',
			'foreignKey' => 'general_objective_id',
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
		'ProcessIndicator' => array(
			'className' => 'ProcessIndicator',
			'foreignKey' => 'general_objective_id',
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
			'foreignKey' => 'general_objective_id',
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
