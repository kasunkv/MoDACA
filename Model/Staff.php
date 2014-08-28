<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Staff Model
 *
 * @property User $User
 */
class Staff extends AppModel {
        
        public function beforeSave($options = array()) {
		$this->data['Staff']['profile_photo'] = "";
                if (!empty($this->data['Staff']['password'])) {
                    $passwordHasher = new SimplePasswordHasher(array('hashType' => 'md5'));
                    $this->data['Staff']['password'] = $passwordHasher->hash($this->data['Staff']['password']);
                }
                return true;
        }
	
        public $displayField = 'first_name';

        
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
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
}
