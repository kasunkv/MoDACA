<?php
App::uses('AppModel', 'Model');
/**
 * Legend Model
 *
 * @property Questionnaire $Questionnaire
 * @property Questionnaire $Questionnaire
 */
class Legend extends AppModel {

	public $displayField = 'title';

	public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'entry_no' => array(
			'custom' => array(
				'rule' => '/^[0-9]+$/',
				'message' => 'Must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Entry number must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Entry number must not exceed 40 characters.',
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
				'rule' => array('maxLength', 40),
				'message' => 'Identifier must not exceed 40 characters.',
			),
		),
		'entry' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Entry must not be invalid.',
			),
		),
		'lower_range_value' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Lower range value must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Lower range value must not be empty.',
			),
		),
		'upper_range_value' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Upper range value must be a number.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Upper range value must not be empty.',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Questionnaire' => array(
			'className' => 'Questionnaire',
			'foreignKey' => 'questionnaire_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Questionnaire' => array(
			'className' => 'Questionnaire',
			'foreignKey' => 'legend_id',
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
