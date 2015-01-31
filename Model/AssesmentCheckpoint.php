<?php
App::uses('AppModel', 'Model');
/**
 * AssesmentCheckpoint Model
 *
 * @property PeerAssesment $PeerAssesment
 */
class AssesmentCheckpoint extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'checkpoint' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PeerAssesment' => array(
			'className' => 'PeerAssesment',
			'foreignKey' => 'assesment_checkpoint_id',
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
