<?php
App::uses('Golfclub', 'Model');

/**
 * Golfclub Test Case
 *
 */
class GolfclubTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.golfclub',
		'app.tournament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Golfclub = ClassRegistry::init('Golfclub');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Golfclub);

		parent::tearDown();
	}

}
