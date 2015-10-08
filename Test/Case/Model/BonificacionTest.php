<?php
App::uses('Bonificacion', 'Model');

/**
 * Bonificacion Test Case
 *
 */
class BonificacionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bonificacion',
		'app.personal',
		'app.comision',
		'app.contrato',
		'app.equipo',
		'app.bonificacions_personal'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bonificacion = ClassRegistry::init('Bonificacion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bonificacion);

		parent::tearDown();
	}

}
