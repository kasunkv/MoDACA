<?php
App::uses('AppModel', 'Model');
/**
 * FieldGroup Model
 *
 */
class FieldGroup extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'field_group_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'field_group_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'field_group_id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'field_group_name' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\- ]+$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Field group name must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength', 12),
				'message' => 'Field group name must not exceed 12 characters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'no_of_members' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'No of members must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'No of members must be a number.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'field_group_field_community_identifier' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\-]{4,40}$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Identifier must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Identifier must not exceed 40 characters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'field_group_task_assigner_index_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Task assigner index must not be empty.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Task assigner index must be a number.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
