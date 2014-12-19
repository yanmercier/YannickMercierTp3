<?php
App::uses('ParticipantsTournament', 'Model');

/**
 * ParticipantsTournament Test Case
 *
 */
class ParticipantsTournamentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.participants_tournament',
		'app.participant',
		'app.player',
		'app.tournament',
		'app.user',
		'app.golfclub'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ParticipantsTournament = ClassRegistry::init('ParticipantsTournament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ParticipantsTournament);

		parent::tearDown();
	}

}
