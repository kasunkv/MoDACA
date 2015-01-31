<?php
App::uses('AppModel', 'Model');
/**
 * Intervention Model
 *
 * @property Determinant $Determinant
 */
class Intervention extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Determinant' => array(
			'className' => 'Determinant',
			'foreignKey' => 'determinant_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
