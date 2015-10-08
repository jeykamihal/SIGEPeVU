<?php
App::uses('Equipo', 'Model');

/**
 * Equipo Test Case
 *
 */
class EquipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.equipo',
		'app.personal',
		'app.comision',
		'app.contrato',
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
		$this->Equipo = ClassRegistry::init('Equipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Equipo);

		parent::tearDown();
	}

}
