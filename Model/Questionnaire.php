<?php
App::uses('AppModel', 'Model');
/**
 * Questionnaire Model
 *
 * @property Legend $Legend
 * @property Determinant $Determinant
 * @property Score $Score
 * @property FamilyMemberKnowledge $FamilyMemberKnowledge
 * @property Legend $Legend
 * @property PregnantMotherKnowledge $PregnantMotherKnowledge
 * @property QuestionnaireFeedback $QuestionnaireFeedback
 * @property Question $Question
 */
class Questionnaire extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Legend' => array(
			'className' => 'Legend',
			'foreignKey' => 'legend_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Determinant' => array(
			'className' => 'Determinant',
			'foreignKey' => 'determinant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Score' => array(
			'className' => 'Score',
			'foreignKey' => 'score_id',
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
		'QuestionnaireFeedback' => array(
			'className' => 'QuestionnaireFeedback',
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
