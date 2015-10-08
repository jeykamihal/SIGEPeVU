<?php
/**
 * EquipoFixture
 *
 */
class EquipoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'equCodigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'equPatente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'equTipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'equEstado' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'equFecRevTecnica' => array('type' => 'date', 'null' => true, 'default' => null),
		'personal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'RefPersonals6' => array('column' => 'personal_id', 'unique' => 0)
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
			'equCodigo' => 'Lorem ipsum dolor sit amet',
			'equPatente' => 'Lorem ipsum dolor sit amet',
			'equTipo' => 'Lorem ipsum dolor sit amet',
			'equEstado' => 'Lorem ipsum dolor sit amet',
			'equFecRevTecnica' => '2015-04-27',
			'personal_id' => 1
		),
	);

}
