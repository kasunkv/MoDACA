<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('Folder','Utility');
/**
 * Staff Model
 *
 * @property User $User
 * @property DeterminantFeedback $DeterminantFeedback
 * @property EventFeedback $EventFeedback
 * @property GroupFeedback $GroupFeedback
 * @property QuestionnaireFeedback $QuestionnaireFeedback
 * @property StudentFeedback $StudentFeedback
 */
class Staff extends AppModel {


    public function beforeSave($options = array()) {
        if (!empty($this->data['Staff']['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'md5'));
            $this->data['Staff']['password'] = $passwordHasher->hash($this->data['Staff']['password']);
        }
        return true;
    }

    public $displayField = 'first_name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'DeterminantFeedback' => array(
			'className' => 'DeterminantFeedback',
			'foreignKey' => 'staff_id',
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
		'EventFeedback' => array(
			'className' => 'EventFeedback',
			'foreignKey' => 'staff_id',
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
		'GroupFeedback' => array(
			'className' => 'GroupFeedback',
			'foreignKey' => 'staff_id',
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
			'foreignKey' => 'staff_id',
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
		'StudentFeedback' => array(
			'className' => 'StudentFeedback',
			'foreignKey' => 'staff_id',
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
