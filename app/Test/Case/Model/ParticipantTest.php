<?php
App::uses('Participant', 'Model');

/**
 * Participant Test Case
 *
 */
class ParticipantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.participant',
		'app.player',
		'app.tournament',
		'app.participants_tournament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Participant = ClassRegistry::init('Participant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Participant);

		parent::tearDown();
	}

}
