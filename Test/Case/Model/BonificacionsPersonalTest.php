<?php
App::uses('BonificacionsPersonal', 'Model');

/**
 * BonificacionsPersonal Test Case
 *
 */
class BonificacionsPersonalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bonificacions_personal',
		'app.personal',
		'app.comision',
		'app.contrato',
		'app.equipo',
		'app.bonificacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BonificacionsPersonal = ClassRegistry::init('BonificacionsPersonal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BonificacionsPersonal);

		parent::tearDown();
	}

}
