<?php
App::uses('AppModel', 'Model');
/**
 * FieldGroupProgress Model
 *
 * @property FieldGroup $FieldGroup
 */
class FieldGroupProgress extends AppModel {
    
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_of_field_visits' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
		),
		'community_feedback' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Community feedback contains invalid characters.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Community feedback must not exceed 255 characters.',
			),
		),
		'mark' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Must be a number.',
			),
		),
		'note' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Note contains invalid characters.',
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
}
