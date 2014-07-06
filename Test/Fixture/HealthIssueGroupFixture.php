<?php
/**
 * HealthIssueGroupFixture
 *
 */
class HealthIssueGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'health_issue_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'health_issue_group_identifier' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'health_issue_group_field_community_identifier' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'no_of_members' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false),
		'primary_health_issue' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'health_issue_group_health_issue_identifier' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'health_issue_group_id', 'unique' => 1),
			'health_issue_group_field_community_id' => array('column' => 'health_issue_group_field_community_identifier', 'unique' => 0),
			'health_issue_group_health_issue_id' => array('column' => 'health_issue_group_health_issue_identifier', 'unique' => 0),
			'health_issue_group_identifier' => array('column' => 'health_issue_group_identifier', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'health_issue_group_id' => 1,
			'health_issue_group_identifier' => 'Lorem ipsum dolor sit amet',
			'health_issue_group_field_community_identifier' => 'Lorem ipsum dolor sit amet',
			'no_of_members' => 1,
			'primary_health_issue' => 'Lorem ipsum dolor sit amet',
			'health_issue_group_health_issue_identifier' => 'Lorem ipsum dolor sit amet'
		),
	);

}
