<?php
App::uses('AppModel', 'Model');
/**
 * Administrator Model
 *
 * @property User $User
 */
class Administrator extends AppModel {

        public function beforeSave() {
		$this->data['Administrator']['password'] = AuthComponent::password($this->data['Administrator']['password']);
                return true;
	}
        
	public $displayField = 'first_name';
        
        public $validate = array(
		'id' => array(
			'blank' => array(
				'rule' => array('blank'),
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'custom' => array(
				'rule' => '/^[A-Z][A-Za-z. ]+$/',
				'message' => 'First name should only contain letters and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'First name can not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'First name must not exceed 255 characters.',
			),
		),
		'last_name' => array(
			'custom' => array(
				'rule' => '/^[A-Z][A-Za-z. ]+$/',
				'message' => 'Last name should only contain letters and spaces.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Last name should not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Last name must not exceed 255 characters.',
			),
		),
		'gender' => array(
			'custom' => array(
				'rule' => '/^(Male|Female)$/',
				'message' => 'Gender should be Male or Female',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Gender must not be empty',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Must be a valid email address',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Email address must not be empty.',
			),
		),
		'contact_no' => array(
			'custom' => array(
				'rule' => '/^0[1-9][0-9]{8}$/',
				'message' => 'Must be a valid telephone number.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 10),
				'message' => 'Contact number must not exceed 10 digits.',
			),
		),
		'address' => array(
			'custom' => array(
				'rule' => '/^[0-9A-Za-z\-, ./()]+$/',
				'message' => 'Must be a valid address.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Address must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Address must not exceed255 characters.',
			),
		),
		'designation' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z\-, ./()]+$/',
				'message' => 'Must not contain numbers and special characters.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Designation must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'Destination must not exceed 255 characters.',
			),
		),
		'username' => array(
			'custom' => array(
				'rule' => '/^[A-Za-z0-9_\-]{4,40}$/',
				'message' => 'Must only contain digits, letters, dashs and underscores.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Username must not be empty.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Username must not exceed 40 characters.',
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => '/^([\w\d\W\][^<>{}\[\]\(\)])+$/',
				'message' => 'Password has invalid charactors.',
			),
			'maxLength' => array(
				'rule' => array('maxLength', 40),
				'message' => 'Password must not exceed 40 characters.',
			),
			'minLength' => array(
				'rule' => array('minLength', 4),
				'message' => 'Password must have minimum of 4 characters.',
			),
		),
		'profile_photo' => array(			
			'maxLength' => array(
				'rule' => array('maxLength', 255),
				'message' => 'URL must not exceed 255 characters.',
			),
		),
		'bio' => array(
			'custom' => array(
				'rule' => '/([\w\d\W\s][^<>{}\[\]\(\)])+/',
				'message' => 'Bio must not be invalid.',
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Bio must not be empty.',
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
