<?php
App::uses('Player', 'Model');

/**
 * Player Test Case
 *
 */
class PlayerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.player',
		'app.participant',
		'app.tournament',
		'app.user',
		'app.golfclub',
		'app.participants_tournament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Player = ClassRegistry::init('Player');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Player);

		parent::tearDown();
	}

}
