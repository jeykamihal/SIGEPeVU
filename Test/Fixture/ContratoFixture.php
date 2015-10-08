<?php
/**
 * ContratoFixture
 *
 */
class ContratoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'conTipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'conPlazo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'conFecFin' => array('type' => 'date', 'null' => true, 'default' => null),
		'personal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'RefPersonals5' => array('column' => 'personal_id', 'unique' => 0)
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
			'conTipo' => 'Lorem ipsum dolor sit amet',
			'conPlazo' => 1,
			'conFecFin' => '2015-04-27',
			'personal_id' => 1
		),
	);

}
