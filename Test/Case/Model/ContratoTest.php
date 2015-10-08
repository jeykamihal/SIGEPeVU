<?php
App::uses('Contrato', 'Model');

/**
 * Contrato Test Case
 *
 */
class ContratoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contrato',
		'app.personal',
		'app.comision',
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
		$this->Contrato = ClassRegistry::init('Contrato');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contrato);

		parent::tearDown();
	}

}
