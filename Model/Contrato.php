<?php
App::uses('AppModel', 'Model');
/**
 * Contrato Model
 *
 * @property Personal $Personal
 */
class Contrato extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'personal_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Personal' => array(
			'className' => 'Personal',
			'foreignKey' => 'personal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
