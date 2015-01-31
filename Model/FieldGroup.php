<?php
App::uses('AppModel', 'Model');
/**
 * FieldGroup Model
 *
 * @property Score $Score
 * @property CompletePeerAssesment $CompletePeerAssesment
 * @property DeterminantFeedback $DeterminantFeedback
 * @property Determinant $Determinant
 * @property EventFeedback $EventFeedback
 * @property Event $Event
 * @property FieldCommunity $FieldCommunity
 * @property FieldGroupProgress $FieldGroupProgress
 * @property GeneralObjective $GeneralObjective
 * @property GroupFeedback $GroupFeedback
 * @property GroupLocation $GroupLocation
 * @property InputIndicator $InputIndicator
 * @property OutcomeIndicator $OutcomeIndicator
 * @property OutputIndicator $OutputIndicator
 * @property PeerAssesment $PeerAssesment
 * @property ProcessIndicator $ProcessIndicator
 * @property QuestionnaireFeedback $QuestionnaireFeedback
 * @property Student $Student
 * @property TaskAssigner $TaskAssigner
 */
class FieldGroup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
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

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Score' => array(
			'className' => 'Score',
			'foreignKey' => 'score_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'CompletePeerAssesment' => array(
			'className' => 'CompletePeerAssesment',
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
		'DeterminantFeedback' => array(
			'className' => 'DeterminantFeedback',
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
		'Determinant' => array(
			'className' => 'Determinant',
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
		'EventFeedback' => array(
			'className' => 'EventFeedback',
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
		'Event' => array(
			'className' => 'Event',
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
		'FieldCommunity' => array(
			'className' => 'FieldCommunity',
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
		'GeneralObjective' => array(
			'className' => 'GeneralObjective',
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
		'GroupFeedback' => array(
			'className' => 'GroupFeedback',
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
		'GroupLocation' => array(
			'className' => 'GroupLocation',
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
		'InputIndicator' => array(
			'className' => 'InputIndicator',
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
		'OutcomeIndicator' => array(
			'className' => 'OutcomeIndicator',
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
		'OutputIndicator' => array(
			'className' => 'OutputIndicator',
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
		'PeerAssesment' => array(
			'className' => 'PeerAssesment',
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
		'ProcessIndicator' => array(
			'className' => 'ProcessIndicator',
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
		'QuestionnaireFeedback' => array(
			'className' => 'QuestionnaireFeedback',
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
		),
		'TaskAssigner' => array(
			'className' => 'TaskAssigner',
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
