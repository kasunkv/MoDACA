<?php
App::uses('AppModel', 'Model');
/**
 * PregnantMother Model
 *
 * @property Household $Household
 * @property FamilyMember $FamilyMember
 * @property PregnantMotherKnowledge $PregnantMotherKnowledge
 */
class PregnantMother extends AppModel {


	public $displayField = 'family_member_id';

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Note must not be invalid.',
			),
		),
		'fetus_age' => array(
                        'numeric' => array(
                                'rule' => array('numeric'),
                                'message' => 'Fetus age must be a number.',
                        ),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Fetus age must not be empty.',
			),
		),
                'no_of_children' => array(                            
                        'numeric' => array(
                                'rule' => array('numeric'),
                                'message' => 'No of children must be a number.',
                        ),
                ),    
		'weight' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Weight must not be empty.',
			),
                        'decimal' => array(
                                'rule' => array('decimal', 2),
                                'message' => 'weight must be a decilmal value with 2 decimal points.',
                        ),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Household' => array(
			'className' => 'Household',
			'foreignKey' => 'household_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FamilyMember' => array(
			'className' => 'FamilyMember',
			'foreignKey' => 'family_member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'PregnantMotherKnowledge' => array(
			'className' => 'PregnantMotherKnowledge',
			'foreignKey' => 'pregnant_mother_id',
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
