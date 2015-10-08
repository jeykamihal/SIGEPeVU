<?php
App::uses('AppModel', 'Model');
/**
 * Personal Model
 *
 * @property Comision $Comision
 * @property Contrato $Contrato
 * @property Equipo $Equipo
 * @property Bonificacion $Bonificacion
 */
class Personal extends AppModel { 
   

// var $name = 'Personal';
 var $displayField = 'Apellido_Nombre';     // este es el campo m�gico, si se lo saco me muestra el id del grupo


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'Apellido_Nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'DNI' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'comision_id' => array(
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
		'Comision' => array(
			'className' => 'Comision',
			'foreignKey' => 'comision_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contrato' => array(
			'className' => 'Contrato',
			'foreignKey' => 'personal_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Equipo' => array(
			'className' => 'Equipo',
			'foreignKey' => 'personal_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Bonificacion' => array(
			'className' => 'Bonificacion',
			'joinTable' => 'bonificacions_personals',
			'foreignKey' => 'personal_id',
			'associationForeignKey' => 'bonificacion_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

  
   

}
