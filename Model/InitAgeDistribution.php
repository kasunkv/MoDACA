<?php
App::uses('AppModel', 'Model');
/**
 * InitAgeDistribution Model
 *
 * @property FieldCommunity $FieldCommunity
 */
class InitAgeDistribution extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
			'foreignKey' => 'field_community_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
