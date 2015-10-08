<?php
App::uses('Comision', 'Model');

/**
 * Comision Test Case
 *
 */
class ComisionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comision',
		'app.personal',
		'app.contrato',
		'app.equipo',
		'app.bonificacion',
		'app.bonificacions_personal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comision = ClassRegistry::init('Comision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comision);

		parent::tearDown();
	}

}
