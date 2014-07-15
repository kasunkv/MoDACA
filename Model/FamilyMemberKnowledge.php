<?php
App::uses('AppModel', 'Model');
/**
 * FamilyMemberKnowledge Model
 *
 * @property FamilyMember $FamilyMember
 * @property Questionnaire $Questionnaire
 */
class FamilyMemberKnowledge extends AppModel {
    
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'marks_percent' => array(
			'decimal' => array(
				'rule' => array('decimal', 2),
				'message' => 'Mark presentage must be a decilmal value with 2 decimal points.',
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Note must not be invalid.',
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed
        
        public $belongsTo = array(
		'FamilyMember' => array(
			'className' => 'FamilyMember',
			'foreignKey' => 'family_member_id',
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
