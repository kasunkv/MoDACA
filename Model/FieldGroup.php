<?php
App::uses('AppModel', 'Model');
/**
 * FieldGroup Model
 *
 * @property FieldCommunity $FieldCommunity
 * @property TaskAssigner $TaskAssigner
 * @property FieldCommunity $FieldCommunity
 * @property TaskAssigner $TaskAssigner
 * @property FieldGroupProgress $FieldGroupProgress
 * @property Student $Student
 */
class FieldGroup extends AppModel {

	public $displayField = 'name';
        
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\- ]+$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Field group name must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 12),
				'message' => 'Field group name must not exceed 12 characters.',
			),
		),
		'no_of_members' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of members must not be empty.',
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No of members must be a number.',
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasOne = array(
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TaskAssigner' => array(
			'className' => 'TaskAssigner',
			'foreignKey' => 'field_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $belongsTo = array(
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_community_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TaskAssigner' => array(
			'className' => 'TaskAssigner',
			'foreignKey' => 'task_assigner_id',
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
		'FieldGroupProgress' => array(
			'className' => 'FieldGroupProgress',
			'foreignKey' => 'field_group_id',
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
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'field_group_id',
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
