<?php
/**
 * BonificacionsPersonalFixture
 *
 */
class BonificacionsPersonalFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'pbResolucion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pbCantidad' => array('type' => 'integer', 'null' => true, 'default' => null),
		'personal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'bonificacion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'RefPersonals10' => array('column' => 'personal_id', 'unique' => 0),
			'RefBonificacions11' => array('column' => 'bonificacion_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'pbResolucion' => 'Lorem ipsum dolor sit amet',
			'pbCantidad' => 1,
			'personal_id' => 1,
			'bonificacion_id' => 1
		),
	);

}
