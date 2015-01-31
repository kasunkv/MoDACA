<?php
App::uses('HealthIssue', 'Model');

/**
 * HealthIssue Test Case
 *
 */
class HealthIssueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.health_issue',
		'app.baby',
		'app.household',
		'app.field_community',
		'app.field_group',
		'app.task_assigner',
		'app.student',
		'app.user',
		'app.administrator',
		'app.staff',
		'app.determinant_feedback',
		'app.determinant',
		'app.general_objective',
		'app.input_indicator',
		'app.outcome_indicator',
		'app.output_indicator',
		'app.process_indicator',
		'app.specific_objective',
		'app.score',
		'app.event',
		'app.event_feedback',
		'app.event_photo',
		'app.questionnaire',
		'app.legend',
		'app.family_member_knowledge',
		'app.family_member',
		'app.b_m_i',
		'app.pregnant_mother',
		'app.pregnant_mother_knowledge',
		'app.w_h_r',
		'app.questionnaire_feedback',
		'app.question',
		'app.intervention',
		'app.group_feedback',
		'app.student_feedback',
		'app.student_progress',
		'app.field_group_progress',
		'app.health_issue_community',
		'app.health_issue_group',
		'app.health_issue_group_progress',
		'app.indicator',
		'app.child_growth',
		'app.flour_usage',
		'app.navigation_detail',
		'app.oil_usage',
		'app.salt_usage',
		'app.sugar_usage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HealthIssue = ClassRegistry::init('HealthIssue');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HealthIssue);

		parent::tearDown();
	}

}
